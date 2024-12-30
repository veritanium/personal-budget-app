<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:budgets,name,' . $this->budget?->id],
            'description' => ['max:500'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
