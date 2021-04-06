<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string',
            'type' => 'required|string',
            'duration' => 'nullable|numeric',
            'price' => 'required|numeric',
        ];
    }
}
