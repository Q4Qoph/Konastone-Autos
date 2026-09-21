<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return ['name' => ['required', 'string', 'max:120'], 'email' => ['required', 'email', 'max:255'], 'number' => ['nullable', 'string', 'max:40'], 'subject' => ['nullable', 'string', 'max:120'], 'message' => ['required', 'string', 'max:5000']];
    }
}
