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
            'notes' => ['nullable'],
            'amount' => ['required', 'integer', 'min:-1000000', 'max:1000000'],
            'account_id' => ['required', 'exists:accounts,id'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'entity_id' => ['nullable', 'exists:entities,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
