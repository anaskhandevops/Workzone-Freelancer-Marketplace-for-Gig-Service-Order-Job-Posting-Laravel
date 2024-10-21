<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
                'seller_id'=>'required',
                'category_id'=>'required',
                'sub_category_id'=>'required',
                'title'=>'required',
                'slug'=>'required|unique:listings',
                'description'=>'required',
                'thumb_image'=>'required',

                'basic_description'=>'required',
                'basic_price'=>'required|numeric',
                'basic_delivery_date'=>'required',
                'basic_revision'=>'required',
                'basic_fn_website'=>'required',
                'basic_page'=>'required',
                'basic_responsive'=>'required',
                'basic_source_code'=>'required',
                'basic_content_upload'=>'required',
                'basic_speed_optimized'=>'required',

                'standard_description'=>'required',
                'standard_price'=>'required|numeric',
                'standard_delivery_date'=>'required',
                'standard_revision'=>'required',
                'standard_fn_website'=>'required',
                'standard_page'=>'required',
                'standard_responsive'=>'required',
                'standard_source_code'=>'required',
                'standard_content_upload'=>'required',
                'standard_speed_optimized'=>'required',

                'premium_description'=>'required',
                'premium_price'=>'required|numeric',
                'premium_delivery_date'=>'required',
                'premium_revision'=>'required',
                'premium_fn_website'=>'required',
                'premium_page'=>'required',
                'premium_responsive'=>'required',
                'premium_source_code'=>'required',
                'premium_content_upload'=>'required',
                'premium_speed_optimized'=>'required',
            ];
        }

        if ($this->isMethod('put')) {
            if($this->request->get('lang_code') == admin_lang()){
                $rules = [
                    'seller_id'=>'required',
                    'title'=>'required',
                    'slug'=>'required|unique:listings,slug,'.$this->listing.',id',
                    'description'=>'required',
                    'sub_category_id'=>'required',
                    'thumb_image'=>'sometimes|required',
                    'basic_description'=>'required',
                    'basic_price'=>'required|numeric',
                    'basic_delivery_date'=>'required',
                    'basic_revision'=>'required',
                    'basic_fn_website'=>'required',
                    'basic_page'=>'required',
                    'basic_responsive'=>'required',
                    'basic_source_code'=>'required',
                    'basic_content_upload'=>'required',
                    'basic_speed_optimized'=>'required',

                    'standard_description'=>'required',
                    'standard_price'=>'required|numeric',
                    'standard_delivery_date'=>'required',
                    'standard_revision'=>'required',
                    'standard_fn_website'=>'required',
                    'standard_page'=>'required',
                    'standard_responsive'=>'required',
                    'standard_source_code'=>'required',
                    'standard_content_upload'=>'required',
                    'standard_speed_optimized'=>'required',

                    'premium_description'=>'required',
                    'premium_price'=>'required|numeric',
                    'premium_delivery_date'=>'required',
                    'premium_revision'=>'required',
                    'premium_fn_website'=>'required',
                    'premium_page'=>'required',
                    'premium_responsive'=>'required',
                    'premium_source_code'=>'required',
                    'premium_content_upload'=>'required',
                    'premium_speed_optimized'=>'required',

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
            'seller_id.required' => trans('translate.Seller is required'),
            'category_id.required' => trans('translate.Category is required'),
            'sub_category_id.required' => trans('translate.Sub Category is required'),
            'title.required' => trans('translate.Title is required'),
            'slug.required' => trans('translate.Slug is required'),
            'slug.unique' => trans('translate.Slug already exist'),
            'description.required' => trans('translate.Description is required'),
            'thumb_image.required' => trans('translate.Image is required'),

            'basic_description.required' => trans('translate.Package description is required'),
            'basic_price.required' => trans('translate.Price is required'),
            'basic_delivery_date.required' => trans('translate.Delivery date is required'),
            'basic_revision.required' => trans('translate.Revision is required'),
            'basic_fn_website.required' => trans('translate.Functional website is required'),
            'basic_page.required' => trans('translate.Page is required'),
            'basic_responsive.required' => trans('translate.Responsive is required'),
            'basic_source_code.required' => trans('translate.Source code is required'),
            'basic_content_upload.required' => trans('translate.Content upload is required'),
            'basic_speed_optimized.required' => trans('translate.Speed optimized is required'),

            'standard_description.required' => trans('translate.Package description is required'),
            'standard_price.required' => trans('translate.Price is required'),
            'standard_delivery_date.required' => trans('translate.Delivery date is required'),
            'standard_revision.required' => trans('translate.Revision is required'),
            'standard_fn_website.required' => trans('translate.Functional website is required'),
            'standard_page.required' => trans('translate.Page is required'),
            'standard_responsive.required' => trans('translate.Responsive is required'),
            'standard_source_code.required' => trans('translate.Source code is required'),
            'standard_content_upload.required' => trans('translate.Content upload is required'),
            'standard_speed_optimized.required' => trans('translate.Speed optimized is required'),

            'premium_description.required' => trans('translate.Package description is required'),
            'premium_price.required' => trans('translate.Price is required'),
            'premium_delivery_date.required' => trans('translate.Delivery date is required'),
            'premium_revision.required' => trans('translate.Revision is required'),
            'premium_fn_website.required' => trans('translate.Functional website is required'),
            'premium_page.required' => trans('translate.Page is required'),
            'premium_responsive.required' => trans('translate.Responsive is required'),
            'premium_source_code.required' => trans('translate.Source code is required'),
            'premium_content_upload.required' => trans('translate.Content upload is required'),
            'premium_speed_optimized.required' => trans('translate.Speed optimized is required'),

        ];
    }
}
