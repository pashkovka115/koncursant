<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BidUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "musical_number" => "Руслан и людмила",
            "comment" => "juiuikhvdsaiucd uyiuy uyuiyvv",
            "appraisal" => "cv cfbfgbdf",
            "type" => '',
            "country" => '',
            "city" => '',
            "user_first_name" => '',
            "user_last_name" => '',
            "teacher_first_name" => '',
            "teacher_last_name" => '',
            "teacher_third_name" => '',
            "btn_save_list" => '',
        ];
    }
}
