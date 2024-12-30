<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
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
            'name' => ['required', 'unique:accounts,budget_id,name,' . $this->account?->id],
            'bank_name' => ['nullable'],
            'account_number' => ['nullable','digits:4'],
            'account_type' => ['required',Rule::in(['checking', 'savings', 'cash'])],
            'location' => [],
        ];
    }
}
