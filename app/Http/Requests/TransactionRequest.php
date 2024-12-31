<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'account_id' => ['required', 'exists:accounts,id'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'entity_id' => ['nullable', 'exists:entities,id'],
            'amount' => ['required', 'min:0', 'max:1000000'],
            'type' => ['required', Rule::in(['debit', 'credit'])],
            'date' => ['required', 'date'],
            'notes' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
