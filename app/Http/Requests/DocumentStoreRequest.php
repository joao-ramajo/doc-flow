<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DocumentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return (Auth::user()->role === 'admin' || Auth::user()->role === 'employee');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'observations' => 'nullable|string|max:100',
            'path' => 'required|file|mimes:jpg,png,pdf,jpeg,txt,csv,docx,xml,xlsx|max:5024',
            'client_id' => 'required',
            'business_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'title.string' => 'O título deve ser uma string válida.',
            'title.max' => 'O título não pode ter mais que 50 caracteres.',

            'observations.string' => 'As observações devem ser um texto válido.',
            'observations.max' => 'As observações não podem ter mais que 100 caracteres.',

            'path.required' => 'O arquivo do documento é obrigatório.',
            'path.mimes' => 'O arquivo deve ser do tipo: jpg, png, pdf, jpeg, txt, csv, docx, xml, xlsx.',
            'path.max' => 'O arquivo não pode ser maior que 2MB.',

            'client_id.required' => 'É necessário selecionar um cliente.',
            'business_id.required' => 'É necessário selecionar um negócio.',
        ];
    }
}
