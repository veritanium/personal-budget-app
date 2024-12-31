<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:tags,budget_id,name,' . $this->tag?->id],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
