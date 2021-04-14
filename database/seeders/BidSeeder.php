<?php

namespace Database\Seeders;

use App\Models\Appraisal;
use App\Models\Competition;
use App\Models\CompetitionType;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BidSeeder extends Seeder
{
    public function run(Faker $faker)
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
            [
                'id' => 5,
                'type' => 'amateur'
            ],
            [
                'id' => 6,
                'type' => 'professional'
            ],
        ];

        $appraisals_ids = array_keys(Appraisal::get('id')->keyBy('id')->toArray());

        for ($j = 1; $j <= 10; $j++) {
            $bids = [];

            for ($i = 1; $i <= 100; $i++) {
                $item = $types[array_rand($types)];
                $date = $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now');

                $bids[] = [
                    'type' => $item['type'],

                    'competition_id' => $item['id'],
                    'nomination_id' => 1,
                    'age_group_id' => 1,
                    'tariff_id' => ($i <= 5) ? rand(1, 4) : rand(5, 8),

                    'musical_instrument' => 'Скрипка',
                    'musical_number' => 'Руслан и людмила',
                    'koll_name' => 'Солнечные васельки',
                    'educational_institution' => 'ДШИ имени С.В. Рахманинова',
                    'quantity_kollective_diploma' => 10,

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

                    'appraisal_id' => $appraisals_ids[array_rand($appraisals_ids)], // todo: на время теста вывода на фронте по кварталам
                    'processe_state' => '0', // todo: на время теста вывода на фронте по кварталам
                    'new_state' => '0', // todo: на время теста вывода на фронте по кварталам

                    'created_at' => $date,
                    'updated_at' => $date,
                ];
            }
            \DB::table('bids')->insert($bids);
        }

    }
}
