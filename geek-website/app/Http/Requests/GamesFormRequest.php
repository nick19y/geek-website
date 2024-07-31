<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GamesFormRequest extends FormRequest
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
            'name'=>['required', 'min:3']
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'O nome do jogo é obrigatório',
            'name.min'=>'O nome do jogo deve ter no míninmo :min caracteres'
        ];
    }
}
