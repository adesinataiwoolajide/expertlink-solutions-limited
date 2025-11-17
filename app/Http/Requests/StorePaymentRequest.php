<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
     public function authorize(): bool
    {
        if(Auth::user()->hasAnyRole(['Student'])){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'totalAmount' => 'required|numeric',
            'paymentMethod' => 'required|string',
            'currencyCode' => 'required|string',
            'paymentDescription' => 'nullable|string',
            'transactionReference' => 'required|string|unique:payments,transactionReference',
            'paymentReference' => 'required|string|unique:payments,paymentReference',
        ];
    }
}
