<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class FormRequestAlugueis extends FormRequest
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
                'livro_id' => 'required',
                'usuario_id' => 'required',
                'data_inicial' => 'required',
                'data_final' => 'required'
            ];
        }
        return $request;
    }
}
