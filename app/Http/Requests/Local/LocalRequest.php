<?php

namespace App\Http\Requests\Local;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_id' => 'required|numeric',
            'name' => 'required|string|min:3',
            'phone_number' => 'required|string|numeric',
            'address' => 'required|string|min:5'
        ];
    }
}