<?php

namespace Modules\JobPost\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            $rules = [
                'user_id'=>'required',
                'category_id'=>'required',
                'city_id'=>'required',
                'title'=>'required',
                'slug'=>'required|unique:job_posts',
                'description'=>'required',
                'regular_price'=>'required|numeric',
                'thumb_image'=>'required',
                'job_type'=>'required',
            ];
        }

        if ($this->isMethod('put')) {
            if($this->request->get('lang_code') == admin_lang()){
                $rules = [
                    'user_id'=>'required',
                    'category_id'=>'required',
                    'city_id'=>'required',
                    'title'=>'required',
                    'slug'=>'required|unique:job_posts,slug,'.$this->jobpost.',id',
                    'description'=>'required',
                    'regular_price'=>'required|numeric',
                    'thumb_image'=>'sometimes|required',
                ];
            }else{
                $rules = [
                    'title'=>'required',
                    'description'=>'required',
                ];
            }
        }

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
            'user_id.required' => trans('translate.User is required'),
            'category_id.required' => trans('translate.Category is required'),
            'city_id.required' => trans('translate.City is required'),
            'title.required' => trans('translate.Title is required'),
            'slug.required' => trans('translate.Slug is required'),
            'slug.unique' => trans('translate.Slug already exist'),
            'description.required' => trans('translate.Description is required'),
            'regular_price.required' => trans('translate.Price is required'),
            'regular_price.numeric' => trans('translate.Price should be numeric'),
            'thumb_image.required' => trans('translate.Image is required'),
        ];
    }
}
