<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurFeatureRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $rules =  [
            'feature_title1' => 'required',
            'feature_title2' => 'required',
            'feature_title3' => 'required',
            'feature_title4' => 'required',
            'feature_title5' => 'required',

        ];

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'feature_title1.required' => trans('translate.Title is required'),
            'feature_title2.required' => trans('translate.Title is required'),
            'feature_title3.required' => trans('translate.Title is required'),
            'feature_title4.required' => trans('translate.Title is required'),
            'feature_title5.required' => trans('translate.Title is required'),

        ];
    }
}
