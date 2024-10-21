<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $rules =  [
            'short_title' => 'required',
            'title' => 'required',
            'description' => 'required',
            'item1' => 'required',
            'item2' => 'required',
            'item3' => 'required',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'short_title.required' => trans('translate.Title is required'),
            'title.required' => trans('translate.Title is required'),
            'description.required' => trans('translate.Description is required'),
            'item1.required' => trans('translate.Option is required'),
            'item2.required' => trans('translate.Option is required'),
            'item3.required' => trans('translate.Option is required')
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
