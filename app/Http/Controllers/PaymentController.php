<?php

namespace App\Http\Controllers;

use App\Models\{CourseSubscription,Payment};
use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\{Auth, Mail};
use App\Repositories\GeneralRepository;
use App\Mail\{PaymentNotification};

class PaymentController extends Controller
{
    protected $model;
    public function __construct(Payment $payment, CourseSubscription $courseSubscription)
    {
        $this->middleware('auth');
        $this->middleware('role:Administrator|Admin|Student');
        $this->model = new GeneralRepository($courseSubscription, $payment);
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['Administrator', 'Admin'])) {
            $query = Payment::query();
        } elseif ($user->hasAnyRole(['Student'])) {
            $query = Payment::where('userSlug', $user->slug);
        } else {
            return view('errors.403')->with([
                'message' => 'Access Denied. You Do Not Have The Permission To Access This Page on the Portal'
            ]);
        }
        $payments = $query->with('user', 'courseSubscriptions')->orderBy('created_at', 'desc')->paginate();
        $paymentSums = $query->selectRaw('paymentProvider, SUM(totalAmount) as totalSum')->groupBy('paymentProvider')->orderByDesc('totalAmount')->get();
        
        return view('home.payments.index', compact('payments', 'paymentSums'));
    }

    public function show($slug)
    {
        $user = Auth::user();
        $payment = Payment::where('slug', $slug)->with('user', 'courseSubscriptions')->first();
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment record does not exist');
        }
        $isAdmin   = $user->hasAnyRole(['Administrator', 'Admin']);
        $isStudent = $user->hasAnyRole(['Student']) && $payment->userSlug === $user->slug;

        if (!($isAdmin || $isStudent)) {
            return view('errors.403')->with([
                'message' => 'Access Denied. You Do Not Have The Permission To Access This Payment'
            ]);
        }
        // Return single payment to invoice view
        return view('home.payments.invoice', compact('payment'));
    }
    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum('discount');
        $grandTotal = $subtotal;
        return view('home.payments.checkout', compact('grandTotal', 'cart'));
    }

    public function clear()
    {
        session()->forget('cart'); // or session()->put('cart', []);
        return redirect()->route('course.index')->with('success', 'Cart cleared successfully.');
    }

    public function paystackVerify(Request $request)
    {
        
        $cartCount = count(session()->get('cart', []));
        $reference = $request->query('reference');
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->get("https://api.paystack.co/transaction/verify/{$reference}");
        if($cartCount > 0){
            if ($response->successful() && $response['data']['status'] === 'success') {
            
                $cart = session()->get('cart', []);
                $paymentSlug = $response['data']['reference'];
                $totalAmount = $response['data']['amount'] / 100;
                $userSlug = Auth::user()->slug;
                foreach($cart as $id => $item){
                   
                    $courseSlug = $item['slug'];
                    $course_name = $item['course_name'];
                    $price = $item['discount'];
                    $programSlug = $item['programSlug'];
                    $slug = RandomString(12);
                    if(CourseSubscription::where(['courseSlug' => $courseSlug, 'userSlug' => $userSlug])->doesntExist()){
                        createCourseSubscription($userSlug, $slug, $paymentSlug, $courseSlug, $programSlug, $price);
                        createLog( 'Made Payment for ' . $course_name . ' with Slug '. $slug);
                    }
                }
                if(Payment::where(['slug' => $paymentSlug])->doesntExist()){
                    createPayment($userSlug, $paymentSlug, $totalAmount, 
                    $response['data']['channel'], $response['data']['currency'], 'Course payment via Paystack', 
                    $response['data']['reference'], $response['data']['reference'], $response['data']['status'], 'Paystack');
                    createLog( 'Made Payment of ' . $totalAmount . ' with Reference '. $paymentSlug);
                }
                $redirectRoute = $cartCount > 1 ? route('myCourses') : route('mycourse.note.index', $courseSlug);
                session()->forget('cart');
                $details = ["payment" => Payment::where('transactionReference', $paymentSlug)->with('user', 'courseSubscriptions')->first()];
                $email = Auth::user()->email;
                Mail::to($email)->cc(['tolajide74@gmail.com','support@expertlinksolutions.org'])->send( new PaymentNotification ($details));
                return redirect($redirectRoute)->with('success', 'Payment completed successfully.');
            }
            return redirect()->back()->with('error', 'Payment verification failed.');
        }else{
            return redirect()->route('myCourses')->with('success', 'Operation completed successfully.');
        }
    }

    public function verifyMonnify(Request $request)
{
    $reference = $request->query('paymentReference');
    $cartCount = count(session()->get('cart', []));
    $auth = Http::withBasicAuth(env('MONNIFY_API_KEY'), env('MONNIFY_SECRET_KEY')) ->post('https://sandbox.monnify.com/api/v1/auth/login');

    if (!$auth->successful()) {
        return redirect()->back()->with('error', 'Unable to authenticate with Monnify.');
    }

    $token = $auth->json()['responseBody']['accessToken'];
    $verify = Http::withToken($token)
    ->get('https://sandbox.monnify.com/api/v2/merchant/transactions/query', [
        'paymentReference' => $reference
    ]);

    if ($verify->successful()) {
        $data = $verify->json()['responseBody'];
        if ($cartCount > 0 && $data['paymentStatus'] === 'PAID') {
            $cart = session()->get('cart', []);
            $paymentSlug = $data['paymentReference']; // Monnify unique reference
            $totalAmount = $data['amountPaid'];
            $userSlug = Auth::user()->slug;

            foreach ($cart as $id => $item) {
                $courseSlug   = $item['slug'];
                $course_name  = $item['course_name'];
                $price        = $item['price'];
                $programSlug  = $item['programSlug'];
                $slug         = RandomString(12);

                if (CourseSubscription::where(['courseSlug' => $courseSlug, 'userSlug' => $userSlug])->doesntExist()) {
                    createCourseSubscription($userSlug, $slug, $paymentSlug, $courseSlug, $programSlug, $price);
                    createLog('Made Payment for ' . $course_name . ' with Slug ' . $slug);
                }
            }

            if (Payment::where(['slug' => $paymentSlug])->doesntExist()) {
                createPayment($userSlug, $paymentSlug, $totalAmount, $data['paymentMethod'], $data['currency'], 
                $data['paymentDescription'], $data['transactionReference'], $data['paymentReference'], $data['paymentStatus'], 'Monnify');
                createLog('Made Payment of ' . $totalAmount . ' with Reference ' . $paymentSlug);
            }

            $redirectRoute = $cartCount > 1 ? route('myCourses') : route('mycourse.note.index', $courseSlug);
            session()->forget('cart');
            $details = [
                "payment" => Payment::where('transactionReference', $paymentSlug)
                    ->with('user', 'courseSubscriptions')
                    ->first()
            ];
            $email = Auth::user()->email;
            Mail::to($email)
                ->cc(['tolajide74@gmail.com','support@expertlinksolutions.org'])
                ->send(new PaymentNotification($details));

            return redirect($redirectRoute)->with('success', 'Monnify payment completed successfully.');
        }

        return redirect()->back()->with('error', 'Payment verification failed.');
    } else {
        return redirect()->back()->with('error', 'Unable to verify Payment at the moment, Please try again later.');
    }
}

    public function verifyFlutterWave(Request $request)
    {
        $transactionId = $request->query('transaction_id');
        $cartCount = count(session()->get('cart', []));
        $response = Http::withToken(env('FLUTTERWAVE_SECRET_KEY'))->get("https://api.flutterwave.com/v3/transactions/{$transactionId}/verify");
        if ($response->successful()) {
            $data = $response->json();
            if ($cartCount > 0 && $data['status'] === 'success' && $data['data']['status'] === 'successful') {
                $cart = session()->get('cart', []);
                $paymentSlug = $data['data']['flw_ref'];  $totalAmount = $data['data']['amount'];
                $userSlug = Auth::user()->slug;

                foreach ($cart as $id => $item) {
                    $courseSlug = $item['slug']; $course_name = $item['course_name'];
                    $price = $item['discount']; $programSlug = $item['programSlug'];
                    $slug = RandomString(12);
                    if (CourseSubscription::where(['courseSlug' => $courseSlug, 'userSlug' => $userSlug])->doesntExist()) {
                        createCourseSubscription($userSlug, $slug, $paymentSlug, $courseSlug, $programSlug, $price);
                        createLog('Made Payment for ' . $course_name . ' with Slug ' . $slug);
                    }
                }

                if (Payment::where(['slug' => $paymentSlug])->doesntExist()) {
                    createPayment($userSlug, $paymentSlug, $totalAmount, $data['data']['payment_type'], $data['data']['currency'], 
                    'Course payment via Flutterwave', $data['data']['tx_ref'], $data['data']['flw_ref'], $data['data']['status'], 'Flutterwave');
                    createLog('Made Payment of ' . $totalAmount . ' with Reference ' . $paymentSlug);
                }

                $redirectRoute = $cartCount > 1 ? route('myCourses') : route('mycourse.note.index', $courseSlug);
                session()->forget('cart');
                $details = [
                    "payment" => Payment::where('transactionReference', $paymentSlug)->with('user', 'courseSubscriptions')->first()
                ];
                $email = Auth::user()->email;
                Mail::to($email)->cc(['tolajide74@gmail.com','support@expertlinksolutions.org']) ->send(new PaymentNotification($details));
                return redirect($redirectRoute)->with('success', 'Payment completed successfully.');
            }
            return redirect()->back()->with('error', 'Payment verification failed.');
        }else{
            return redirect()->back()->with('error', 'Unable to verify Payment at the moment, Please try again later.');
        }
    }
    public function verifyOPay(Request $request)
    {
        $reference = $request->query('reference');

        // Call Opay API to verify transaction
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.opay.secret_key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.opaycheckout.com/api/v1/inquire', [
            'orderId' => $reference,
        ]);
        dd($response);

        $data = $response->json();

        if (isset($data['code']) && $data['code'] === '0000') {
            // Payment successful
            // Update your order/payment record here
            return redirect()->route('payment.success')->with('status', 'Payment successful!');
        } else {
            // Payment failed
            return redirect()->route('payment.failed')->with('status', 'Payment verification failed.');
        }
    }

   
}
