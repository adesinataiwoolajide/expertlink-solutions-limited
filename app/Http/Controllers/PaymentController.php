<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Http;
class PaymentController extends Controller
{
    public function initializePaystack(Request $request)
    {
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->post('https://api.paystack.co/transaction/initialize', [
            'email' => $request->email,
            'amount' => $request->amount * 100,
            'callback_url' => route('paystack.callback'),
        ]);

        return redirect($response['data']['authorization_url']);
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

    public function stripe(Request $request)
    {
        // Example logic — replace with actual Stripe integration
        $email = $request->input('email');
        $name = $request->input('name');
        $amount = $request->input('amount');

        // You can redirect to Stripe checkout or handle payment here
        return redirect()->route('course.index')->with('success', 'Stripe payment initiated.');
    }


   
}
