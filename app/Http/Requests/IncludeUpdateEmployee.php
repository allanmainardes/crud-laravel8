<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncludeUpdateEmployee extends FormRequest
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
        return [
            'name' => 'required|min:5|max:160',
            'role' => 'required|min:3|max:160',
            'age' => 'required|min:2|max:2|lt:99|gt:17'
        ];
    }
}
