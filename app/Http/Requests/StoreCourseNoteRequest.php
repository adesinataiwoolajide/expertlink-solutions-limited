<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class StoreCourseNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::user()->hasAnyRole(['Administrator', 'Instructor'])){
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
            
            'topic'             => ['nullable', 'string'],
            'content'           => ['nullable', 'string'],
            'title'             => ['nullable', 'string'],
            'chapter'           => ['nullable', 'string'],
            'material.*'        => ['file', 'mimes:pdf,jpg,jpeg,png,png,svg', 'max:1024'],

            'link_one'          => ['nullable', 'url'],
            'link_two'          => ['nullable', 'url'],
            'link_three'        => ['nullable', 'url'],
            'link_four'         => ['nullable', 'url'],

            'status'            => ['nullable', 'in:active,inactive,pending'],
            'instructorSlug'    => ['nullable', 'string'],
            'allocatonSlug'     => ['nullable', 'string'],
            'courseSlug'        => ['nullable', 'string'],
            'programSlug'       => ['nullable', 'string'],
        ];
    }
}
