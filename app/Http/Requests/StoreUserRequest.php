<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::user()->hasAnyRole(['Administrator'])){
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'unique:users,phone_number'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        ];
    }
}