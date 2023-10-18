<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'event_id' => 'required|numeric',
            'client_id' => 'required|numeric',
            'total' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'taxes' => 'required|numeric',
            'creation_date' => 'required|string|min:10'            
        ];
    }
}