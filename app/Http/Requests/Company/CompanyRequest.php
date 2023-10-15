<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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
            'phone_number' => 'required|string|numeric',
            'address' => 'required|string|min:5',
            'image' => [
                'required',
                File::image()
                    ->types(['png', 'jpg', 'jpeg'])
                    ->min(50)
                    ->max(12 * 1024)                    
            ]
        ];
    }
}