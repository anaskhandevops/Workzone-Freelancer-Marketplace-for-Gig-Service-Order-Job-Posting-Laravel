<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExploreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $rules =  [
            'explore_short_title' => 'required',
            'explore_title' => 'required',
            'explore_description' => 'required',
        ];

        if($this->request->get('lang_code') == admin_lang()){
            $rules['explore_total_customer'] = 'required';
            $rules['explore_total_service'] = 'required';
            $rules['explore_total_job'] = 'required';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'explore_short_title.required' => trans('translate.Title is required'),
            'explore_title.required' => trans('translate.Title is required'),
            'explore_description.required' => trans('translate.Description is required'),
            'explore_total_customer.required' => trans('translate.Customer is required'),
            'explore_total_service.required' => trans('translate.Service is required'),
            'explore_total_job.required' => trans('translate.Job is required'),
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
