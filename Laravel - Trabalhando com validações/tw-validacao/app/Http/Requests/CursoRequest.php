<?php

namespace App\Http\Requests;

use App\Rules\CursoPHP;
use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Existe uma regra de validação personalizadas com classes
        return [
            "curso" => ['required', 'max:100', new CursoPHP],
            "carga" => ['required', 'integer']
        ];
    }
}
