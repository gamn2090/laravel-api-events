<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'phone_number' => 'numeric',
            'address' => 'required|string|min:10',
            'email' => 'required|email',
            'document_id' => 'required|numeric',
            'document_number' => 'required',
            'client_type' => 'required|string|min:3'          
        ];
    }
}