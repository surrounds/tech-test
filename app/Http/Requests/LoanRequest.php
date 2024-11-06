<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'loan_lender_id' => 'required|exists:loan_lenders,id',
            'loan_borrower_id' => 'required|exists:loan_borrowers,id',
            'amount' => 'required|numeric',
            'rate' => 'required|numeric',
            'duration' => 'required|numeric',
        ];
    }
}
