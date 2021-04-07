<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'thanks_teacher' => 'required|numeric',
            'diploma' => 'required|numeric',
            'diploma_kollective_electro' => 'required|numeric',
            'diploma_print_solist' => 'required|numeric',
            'diploma_print_kollective' => 'required|numeric',
            'general_diplom_print' => 'required|numeric',
            'discount' => 'required|numeric',
            'cnt_person' => 'required|numeric',
            'max_quantity_participants_price' => 'required|numeric',
        ];
    }
}
