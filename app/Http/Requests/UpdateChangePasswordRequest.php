<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class UpdateChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::user()->hasAnyRole(['Administrator', 'Admin', 'Student', 'Instructor'])){
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
        if(Auth::user()->hasAnyRole(['Administrator', 'Admin'])){
            return [
                'email' => ['required', 'string', 'min:4'],
                'password' => ['required', 'string', 'min:4', 'confirmed'],
                // 'old_password' => ['sometimes', 'string', 'min:4'],
            ];
        }else{
            return [
                'email' => ['required', 'string', 'min:4'],
                'password' => ['required', 'string', 'min:4', 'confirmed'],
                'old_password' => ['required', 'string', 'min:4'],
            ];
        }
    }
}