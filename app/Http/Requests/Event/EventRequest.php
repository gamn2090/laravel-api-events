<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class EventRequest extends FormRequest
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
            'local_id' => 'required|numeric',
            'artist' => 'required|string|min:5',
            'details' => 'required|string|min:5',
            'capacity' => 'required|numeric',
            'date' => 'required|string',
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