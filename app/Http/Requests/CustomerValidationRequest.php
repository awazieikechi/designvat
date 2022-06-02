<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [

            'customer_first_name' => ['required', 'string'],
            'customer_middle_name' => ['required', 'string'],
            'customer_surname' => ['required', 'string'],
            'customer_photo' => ['nullable', 'mimes:jpeg,bmp,png,gif,svg'],
            'customer_email' => ['required', 'string', 'email'],
            'phone_number' => ['required', 'numeric', 'min:11'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string'],
            'customer_state' => ['required', 'string'],
            'customer_local_government' => ['required', 'string'],
            'customer_business_type' => ['required', 'string'],
            'customer_business_address' => ['required', 'string'],
            'customer_business_description' => ['required', 'string'],
            'marital_status' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'next_kin_name' => ['required', 'string'],
            'next_kin_address' => ['required', 'string'],
            'next_kin_phone_number' => ['required', 'numeric', 'min:11'],
            'customer_guarantor_name' => ['required', 'string'],
            'customer_guarantor_address' => ['required', 'string'],
            'customer_guarantor_phone_no' => ['required', 'numeric', 'min:11'],
            'other_transactions' => ['nullable', 'numeric'],
            'account_balance' => ['nullable', 'numeric'],
            'created_at' => ['nullable', 'date'],
            'updated_at' => ['nullable', 'date'],

        ];
    }
}
