<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseValidationRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'expense_category' => ['required', 'string'],
            'expense_detail' => ['required', 'string'],
            'quantity' => ['required', 'numeric'],
            'unit_price' => ['required', 'numeric'],
            'total_cost' => ['required', 'numeric'],
        ];
    }
}
