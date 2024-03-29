<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BidUpdate extends BidStore
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'btn_save' => 'sometimes|nullable',
            'btn_save_and_next' => 'sometimes|nullable',
        ];
        return array_merge(parent::rules(), $rules);
    }
}
