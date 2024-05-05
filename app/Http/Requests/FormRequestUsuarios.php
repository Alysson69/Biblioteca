<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestUsuarios extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $request = [];
        if($this->method() == "POST" || $this->method() == "PUT") {
            $request = [
                'nome' => 'required',
                'cpf' => 'required|unique:usuarios'
            ];
        }
        return $request;
    }
}
