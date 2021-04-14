<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BidStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

// amateur
// professional
// kollective
// solist
    public function rules()
    {
        return [
            'type' => 'nullable|string',

            'competition_id' => 'sometimes|nullable|numeric',
            'nomination_id' => 'sometimes|nullable|numeric',
            'age_group_id' => 'sometimes|nullable|numeric',
            'tariff_id' => 'sometimes|nullable|numeric',

            'confirm_data' => 'sometimes|nullable|string',
            'appraisal' => 'sometimes|nullable|string',
            'processe_state' => 'sometimes|nullable|numeric',

            'cnt_people' => 'sometimes|nullable|string',
            'musical_instrument' => 'sometimes|nullable|string',
            'musical_number' => 'sometimes|nullable|string',
            'koll_name' => 'sometimes|nullable|string',
            'educational_institution' => 'sometimes|nullable|string',

            'participant_diploma_print' => 'sometimes|nullable|string',
            'quantity_kollective_diploma' => 'sometimes|nullable|string',
            'quantity_person_diploma' => 'sometimes|nullable',

            'appraisal_id' => 'sometimes|nullable|numeric',

            // user
            'participant_first_name' => 'array',
            'participant_first_name.*' => 'sometimes|nullable|string',
            'participant_last_name' => 'sometimes|array',
            'participant_last_name.*' => 'sometimes|nullable|string',

            // teacher
            'teacher_first_name' => 'array',
            'teacher_first_name.*' => 'sometimes|nullable|string',
            'teacher_second_name' => 'array',
            'teacher_second_name.*' => 'sometimes|nullable|string',
            'teacher_last_name' => 'array',
            'teacher_last_name.*' => 'sometimes|nullable|string',
            'teacher_third_name' => 'array',
            'teacher_third_name.*' => 'sometimes|nullable|string',
            'teacher_job' => 'array',
            'teacher_job.*' => 'sometimes|nullable|string',
            'teacher_letter_print' => 'sometimes|nullable',
            'teacher_letter_electro' => 'sometimes|nullable',

            // address
            'country_id' => 'sometimes|nullable|string',
            'state' => 'sometimes|nullable|string',
            'city' => 'sometimes|nullable|string',
            'street' => 'sometimes|nullable|string',
            'house' => 'sometimes|nullable|string',
            'apartment' => 'sometimes|nullable|string',
            'postcode' => 'sometimes|nullable|string',
            'email' => 'sometimes|nullable|string',
            'phone' => 'sometimes|nullable|string',

            'resource' => 'sometimes|nullable|string',
            'link_to_resource' => 'sometimes|nullable|string',
            'comment' => 'sometimes|nullable|string',
        ];
    }
}
