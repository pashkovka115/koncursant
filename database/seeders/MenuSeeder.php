<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                "name" => "Верхнее меню",
                "created_at" => "2021-03-23 17:56:34",
                "updated_at" => "2021-03-23 17:56:34"
            ],
            [
                "name" => "Меню в подвале",
                "created_at" => "2021-03-23 18:01:46",
                "updated_at" => "2021-03-23 18:01:46"
            ]
        ];

        $items = [
            [
                "label" => "Главная",
                "link" => "/",
                "parent" => 0,
                "sort" => 0,
                "class" => null,
                "menu" => 1,
                "depth" => 0,
                "created_at" => "2021-03-23 17:57:36",
                "updated_at" => "2021-03-23 17:58:25"
            ],
            [
                "label" => "Конкурсы",
                "link" => "#",
                "parent" => 0,
                "sort" => 1,
                "class" => null,
                "menu" => 1,
                "depth" => 0,
                "created_at" => "2021-03-23 17:58:25",
                "updated_at" => "2021-03-23 17:58:45"
            ],
            [
                "label" => "Результаты",
                "link" => "#",
                "parent" => 0,
                "sort" => 4,
                "class" => null,
                "menu" => 1,
                "depth" => 0,
                "created_at" => "2021-03-23 17:58:45",
                "updated_at" => "2021-03-23 18:18:11"
            ],
            [
                "label" => "Жюри",
                "link" => "/jury",
                "parent" => 0,
                "sort" => 5,
                "class" => null,
                "menu" => 1,
                "depth" => 0,
                "created_at" => "2021-03-23 17:59:05",
                "updated_at" => "2021-03-23 18:18:11"
            ],
            [
                "label" => "Частые вопросы",
                "link" => "/faq",
                "parent" => 0,
                "sort" => 6,
                "class" => null,
                "menu" => 1,
                "depth" => 0,
                "created_at" => "2021-03-23 17:59:23",
                "updated_at" => "2021-03-23 18:18:11"
            ],
            [
                "label" => "Контакты",
                "link" => "/contacts",
                "parent" => 0,
                "sort" => 7,
                "class" => null,
                "menu" => 1,
                "depth" => 0,
                "created_at" => "2021-03-23 17:59:36",
                "updated_at" => "2021-03-23 18:18:11"
            ],
            [
                "label" => "Главная",
                "link" => "/",
                "parent" => 0,
                "sort" => 0,
                "class" => null,
                "menu" => 2,
                "depth" => 0,
                "created_at" => "2021-03-23 18:02:24",
                "updated_at" => "2021-03-23 18:03:09"
            ],
            [
                "label" => "Бесплатные конкурсы",
                "link" => "#",
                "parent" => 0,
                "sort" => 1,
                "class" => null,
                "menu" => 2,
                "depth" => 0,
                "created_at" => "2021-03-23 18:03:09",
                "updated_at" => "2021-03-23 18:03:22"
            ],
            [
                "label" => "Конкурсы с участием профессионального жюри",
                "link" => "#",
                "parent" => 0,
                "sort" => 2,
                "class" => null,
                "menu" => 2,
                "depth" => 0,
                "created_at" => "2021-03-23 18:03:22",
                "updated_at" => "2021-03-23 18:03:35"
            ],
            [
                "label" => "Результаты",
                "link" => "#",
                "parent" => 0,
                "sort" => 3,
                "class" => null,
                "menu" => 2,
                "depth" => 0,
                "created_at" => "2021-03-23 18:03:35",
                "updated_at" => "2021-03-23 18:03:45"
            ],
            [
                "label" => "Жюри",
                "link" => "/jury",
                "parent" => 0,
                "sort" => 4,
                "class" => null,
                "menu" => 2,
                "depth" => 0,
                "created_at" => "2021-03-23 18:03:45",
                "updated_at" => "2021-03-23 18:03:58"
            ],
            [
                "label" => "Частые вопросы",
                "link" => "/faq",
                "parent" => 0,
                "sort" => 5,
                "class" => null,
                "menu" => 2,
                "depth" => 0,
                "created_at" => "2021-03-23 18:03:58",
                "updated_at" => "2021-03-23 18:04:10"
            ],
            [
                "label" => "Контакты",
                "link" => "/contacts",
                "parent" => 0,
                "sort" => 6,
                "class" => null,
                "menu" => 2,
                "depth" => 0,
                "created_at" => "2021-03-23 18:04:10",
                "updated_at" => "2021-03-23 18:17:07"
            ],
            [
                "label" => "Бесплатные конкурсы",
                "link" => "#",
                "parent" => 2,
                "sort" => 2,
                "class" => null,
                "menu" => 1,
                "depth" => 1,
                "created_at" => "2021-03-23 18:17:46",
                "updated_at" => "2021-03-23 18:18:10"
            ],
            [
                "label" => "Конкурсы с участием профессионального жюри",
                "link" => "#",
                "parent" => 2,
                "sort" => 3,
                "class" => null,
                "menu" => 1,
                "depth" => 1,
                "created_at" => "2021-03-23 18:18:00",
                "updated_at" => "2021-03-23 18:18:16"
            ]
        ];

        \DB::table('admin_menus')->insert($menus);
        \DB::table('admin_menu_items')->insert($items);
    }
}
