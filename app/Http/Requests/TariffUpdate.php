<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffUpdate extends TariffStore
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [

        ];

        return array_merge(parent::rules(), $rules);
    }
}
