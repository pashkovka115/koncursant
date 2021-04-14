<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetitionTypeUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string',
            'conditions' => 'nullable|string',
            'email_description' => 'nullable|string',
            'reward' => 'nullable|string',
            'rank' => 'nullable|string',
            'nominations' => 'nullable|string',
            'cost' => 'nullable|string',
        ];
    }
}
