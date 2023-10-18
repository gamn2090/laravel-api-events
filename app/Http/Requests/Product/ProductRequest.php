<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'unidad' => 'required|string'          
        ];
    }
}