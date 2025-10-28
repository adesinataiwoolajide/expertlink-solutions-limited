<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCourseRequest extends FormRequest
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
            'course_name' => ['required', 'string', 'max:255'],
            'course_price' => ['required', 'numeric', 'min:0'],
            'program_name' => ['required', 'string', 'min:1'],
            'banner' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'],
            'basic_requirements' => ['nullable', 'string'],
            'course_outline' => ['nullable', 'string'],
            'learning_module' => ['nullable', 'string'],
            'course_schedule' => ['nullable', 'string'],
            'training_type' => ['required', 'array', 'min:1'],
            'training_type.*' => ['string'],
            'payment_structure' => ['nullable', 'string'],
            'course_overview' => ['nullable', 'string'],
            'course_technologies' => ['nullable', 'string'],
            'packages_included' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
        ];
    }
}
