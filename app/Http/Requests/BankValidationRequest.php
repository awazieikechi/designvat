<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankValidationRequest extends FormRequest
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
            'withrawals' => ['nullable', 'numeric'],
            'deposits' => ['nullable', 'numeric'],
            'user_id' => ['nullable'],
            'date' => ['required', 'date'],
            'transaction_type' => ['required', 'string']

        ];
    }
}
