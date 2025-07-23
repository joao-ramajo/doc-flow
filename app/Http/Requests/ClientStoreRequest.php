<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClientStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role === 'employee';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'business_id' => 'exists:businesses,id',
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|',
            'cpf' => [
                'required',
                'unique:clients',
                'max:14',
                'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/'
            ],
            'rg' => [
                'required',
                'unique:clients',
                'max:12',
                'regex:/^\d{2}\.\d{3}\.\d{3}-[\dXx]$/'
            ],
            'phone' => [
                'required',
                'max:15',
                'string',
                'unique:clients',
                'regex:/^\(\d{2}\)\s?\d{5}\-\d{4}$/'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'business_id.exists' => 'A empresa selecionada é inválida.',

            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve conter apenas caracteres válidos.',
            'name.max' => 'O nome não pode ter mais que 50 caracteres.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'cpf.max' => 'O CPF não pode ter mais que 14 caracteres.',
            'cpf.regex' => 'O CPF deve estar no formato 000.000.000-00.',

            'rg.required' => 'O RG é obrigatório.',
            'rg.unique' => 'Este RG já está cadastrado.',
            'rg.max' => 'O RG não pode ter mais que 12 caracteres.',
            'rg.regex' => 'O RG deve estar no formato 00.000.000-0.',

            'phone.required' => 'O telefone é obrigatório.',
            'phone.max' => 'O telefone não pode ter mais que 14 caracteres.',
            'phone.string' => 'O telefone deve conter apenas caracteres válidos.',
            'phone.unique' => 'Este telefone já está cadastrado.',
            'phone.regex' => 'O telefone deve estar no formato (99)99999-9999.',
        ];
    }
}
