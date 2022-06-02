<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'branch_id' => ['required'],
            'date' => ['required', 'date'],
            'transaction_type' => ['required', 'string']

        ];
    }
}
