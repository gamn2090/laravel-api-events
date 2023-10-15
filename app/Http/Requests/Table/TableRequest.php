<?php

namespace App\Http\Requests\Table;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'local_id' => 'required|numeric',
            'name' => 'required|string|min:3'          
        ];
    }
}