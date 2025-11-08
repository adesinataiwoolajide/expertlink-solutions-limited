<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
     public function authorize(): bool
    {
        if(Auth::user()->hasAnyRole(['Administrator', 'Admin'])){
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
            'heading' => ['required', 'string', 'max:255'],
            'image' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'],
            'description' => ['sometimes', 'string'],
            'status' => ['sometimes', 'in:active,inactive'],
            'event_date' => ['sometimes', 'date'],
            'event_gallery' => ['sometimes', 'array'],
        ];
    }
}
