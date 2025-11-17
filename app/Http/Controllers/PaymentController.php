<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Http;
class PaymentController extends Controller
{
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

    public function stripe(Request $request)
    {
        // Example logic — replace with actual Stripe integration
        $email = $request->input('email');
        $name = $request->input('name');
        $amount = $request->input('amount');

        // You can redirect to Stripe checkout or handle payment here
        return redirect()->route('course.index')->with('success', 'Stripe payment initiated.');
    }

    public function paystackVerify(Request $request)
    {
        $reference = $request->query('reference');
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->get("https://api.paystack.co/transaction/verify/{$reference}");
        if ($response->successful() && $response['data']['status'] === 'success') {
            dd($response['data']);
            // return redirect()->route('course.index')->with('success', 'Payment verified successfully.');
        }
        return redirect()->back()->with('error', 'Payment verification failed.');
    }

    public function verifyMonnify(Request $request)
    {
        $reference = $request->query('paymentReference');

        $auth = Http::withBasicAuth(env('MONNIFY_API_KEY'), env('MONNIFY_SECRET_KEY'))
            ->post('https://api.monnify.com/api/v1/auth/login');

        $token = $auth['responseBody']['accessToken'];

        $verify = Http::withToken($token)->get('https://api.monnify.com/api/v2/merchant/transactions/query', [
            'paymentReference' => $reference
        ]);
        dd($verify['responseBody']);
        if ($verify['responseBody']['paymentStatus'] === 'PAID') {

            // return redirect()->route('course.index')->with('success', 'Monnify payment verified.');
        }

        return redirect()->back()->with('error', 'Payment verification failed.');
    }




   
}
