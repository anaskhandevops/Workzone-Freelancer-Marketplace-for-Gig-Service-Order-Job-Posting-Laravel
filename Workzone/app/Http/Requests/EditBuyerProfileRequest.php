<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class EditBuyerProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'designation' => 'sometimes|max:255',
            'address' => 'sometimes|max:255',
            'phone' => 'sometimes|max:255',
            'hourly_payment' => $this->request->get('hourly_payment') ? 'sometimes|numeric' : '',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => trans('translate.Name is required'),
            'hourly_payment.numeric' => trans('translate.Hourly rate should be numeric'),
        ];
    }
}
