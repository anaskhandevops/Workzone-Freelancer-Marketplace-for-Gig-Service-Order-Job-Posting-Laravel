<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroRequest2 extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'home2_intro_title' => 'required',
            'home2_intro_description' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'home2_intro_title.required' => trans('translate.Title is required'),
            'home2_intro_description.required' => trans('translate.Description is required'),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
