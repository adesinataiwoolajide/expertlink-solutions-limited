<?php

namespace App\Http\Controllers;

use App\Models\{CourseSubscription,Payment};
use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\{Auth};
use App\Repositories\GeneralRepository;

class PaymentController extends Controller
{
    protected $model;
    public function __construct(Payment $payment, CourseSubscription $courseSubscription)
    {
        $this->middleware('auth');
        $this->middleware('role:Administrator|Admin|Student');
        $this->model = new GeneralRepository($courseSubscription, $payment);
    }

    public function initializeMonnify(Request $request)
    {
        $auth = base64_encode(env('MONNIFY_API_KEY') . ':' . env('MONNIFY_SECRET_KEY'));

        $token = Http::withHeaders([
            'Authorization' => 'Basic ' . $auth
        ])->post(env('MONNIFY_BASE_URL') . '/api/v1/auth/login');

        $accessToken = $token['responseBody']['accessToken'];

        $payment = Http::withToken($accessToken)->post(env('MONNIFY_BASE_URL') . '/api/v1/merchant/transactions/init-transaction', [
            'amount' => $request->amount,
            'customerName' => $request->name,
            'customerEmail' => $request->email,
            'paymentReference' => uniqid('MONNIFY_'),
            'paymentDescription' => 'Course Payment',
            'currencyCode' => 'NGN',
            'contractCode' => env('MONNIFY_CONTRACT_CODE'),
            'redirectUrl' => route('monnify.callback')
        ]);

        return redirect($payment['responseBody']['checkoutUrl']);
    }

    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum('price');
        $discount = $subtotal * 0.10;
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
                    $price = $item['price'];
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

        $auth = Http::withBasicAuth(env('MONNIFY_API_KEY'), env('MONNIFY_SECRET_KEY'))->post('https://api.monnify.com/api/v1/auth/login');
        $token = $auth['responseBody']['accessToken'];
        $verify = Http::withToken($token)->get('https://api.monnify.com/api/v2/merchant/transactions/query', [
            'paymentReference' => $reference
        ]);
        dd($verify['responseBody']);
        if ($verify['responseBody']['paymentStatus'] === 'PAID') {
            session()->forget('cart');
            // return redirect()->route('course.index')->with('success', 'Monnify payment verified.');
        }
        return redirect()->back()->with('error', 'Payment verification failed.');
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
