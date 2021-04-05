<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\CompetitionType;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    public function run()
    {
        $types = [
            [
                'id' => 1,
                'type' => 'amateur'
            ],
            [
                'id' => 2,
                'type' => 'professional'
            ],
            [
                'id' => 3,
                'type' => 'amateur'
            ],
            [
                'id' => 4,
                'type' => 'professional'
            ],
        ];

        $bids = [];

        for ($i = 1; $i <= 10; $i++) {
            $item = $types[array_rand($types)];

//            print_r($item);
//            exit();

            $bids[] = [
                'type' => $item['type'],

                'competition_id' => $item['id'],
                'nomination_id' => 1,
                'age_group_id' => 1,
                'tariff_id' => ($i <= 5) ? rand(1, 4) : rand(5, 8),

//                'cnt_people' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
                'musical_instrument' => 'Скрипка',
                'musical_number' => 'Руслан и людмила',
                'koll_name' => 'Солнечные васельки',
                'educational_institution' => 'ДШИ имени С.В. Рахманинова',

                'quantity_kollective_diploma' => 10,
//                'cnt_person_diploma' => 'juiuikhvdsaiucd uyiuy uyuiyvv',

                // user
//                'participant_first_name' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
//                'participant_last_name' => 'juiuikhvdsaiucd uyiuy uyuiyvv',

                // teacher
//                'teacher_first_name' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
//                'teacher_second_name' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
//                'teacher_last_name' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
//                'teacher_job' => 'juiuikhvdsaiucd uyiuy uyuiyvv',

                // address
                'country_id' => 1,
                'state' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
                'city' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
                'street' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
                'house' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
                'apartment' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
                'postcode' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
                'email' => 'juiuikhvdsaiucd uyiuy uyuiyvv',
                'phone' => 'juiuikhvdsaiucd uyiuy uyuiyvv',

                'resource' => ($i % 2 == 0) ? 'ok' : 'youtube',
                'link_to_resource' => ($i % 2 == 0) ? 'https://ok.ru/video/2034366024199' : 'https://youtu.be/qnZYCGmUKss',
                'comment' => 'juiuikhvdsaiucd uyiuy uyuiyvv',

                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \DB::table('bids')->insert($bids);
    }
}
