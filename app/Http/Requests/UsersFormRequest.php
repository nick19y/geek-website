<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest
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
    $passwordRule = $this->isMethod('put') || $this->isMethod('patch')
        ? ['nullable', 'string']
        : ['required', 'string'];

    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'password' => $passwordRule,
        'is_admin' => ['nullable', 'boolean'],
    ];
    }
}
