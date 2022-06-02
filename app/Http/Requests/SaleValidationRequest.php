<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleValidationRequest extends FormRequest
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
            'customer_id' => ['required'],
            'service_id' => ['required'],
            'revenue_amount' => ['nullable', 'numeric'],
            'loan_amount' => ['nullable', 'numeric'],
            'user_id' => ['nullable'],
            'date' => ['required', 'date'],
            'type' => ['required', 'string'],

        ];
    }
}
