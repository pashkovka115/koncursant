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

            'competition_id' => 'nullable|numeric',
            'nomination_id' => 'nullable|numeric',
            'age_group_id' => 'nullable|numeric',
            'tariff_id' => 'nullable|numeric',

            'cnt_people' => 'nullable|string',
            'musical_instrument' => 'nullable|string',
            'musical_number' => 'nullable|string',
            'koll_name' => 'nullable|string',
            'educational_institution' => 'nullable|string',

            'participant_diploma_print' => 'nullable|string',
            'cnt_kollective_diploma' => 'numeric|string',
            'cnt_person_diploma' => 'nullable|numeric',

            // user
            'participant_first_name' => 'array',
            'participant_first_name.*' => 'nullable|string',
            'participant_last_name' => 'array',
            'participant_last_name.*' => 'nullable|string',

            // teacher
            'teacher_first_name' => 'array',
            'teacher_first_name.*' => 'nullable|string',
            'teacher_second_name' => 'array',
            'teacher_second_name.*' => 'nullable|string',
            'teacher_last_name' => 'array',
            'teacher_last_name.*' => 'nullable|string',
            'teacher_job' => 'array',
            'teacher_job.*' => 'nullable|string',

            // address
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'street' => 'nullable|string',
            'house' => 'nullable|string',
            'apartment' => 'nullable|string',
            'postcode' => 'nullable|string',
            'email' => 'nullable|string',
            'phone' => 'nullable|string',

            'resource' => 'nullable|string',
            'link_to_resource' => 'nullable|string',
            'comment' => 'nullable|string',
        ];
    }
}
