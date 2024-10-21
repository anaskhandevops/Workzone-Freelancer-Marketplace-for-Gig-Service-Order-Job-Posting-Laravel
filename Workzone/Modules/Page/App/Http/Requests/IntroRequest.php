<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'intro_title' => 'required',
            'total_rating' => 'required',
            'total_customer' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'intro_title.required' => trans('translate.Title is required'),
            'total_rating.required' => trans('translate.Rating is required'),
            'total_customer.required' => trans('translate.Customer is required')
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
