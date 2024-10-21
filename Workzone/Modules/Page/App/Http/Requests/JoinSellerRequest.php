<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoinSellerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules =  [
            'join_seller_title' => 'required',
            'join_seller_des' => 'required',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'join_seller_title.required' => trans('translate.Title is required'),
            'join_seller_des.required' => trans('translate.Description is required'),
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
