<?php

namespace App\Providers;

use App\Models\AgeGroup;
use App\Models\Bid;
use App\Models\Competition;
use App\Models\CompetitionType;
use App\Models\Country;
use App\Models\Nomination;
use App\Models\Page;
use App\Models\Price;
use App\Models\Tariff;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot()
    {
        require base_path('app/included/functions.php');

        // Для бокового меню в админке
        \View::composer('admin.layouts.sidebar', function($view) {
            $view->with(['competition_types' => CompetitionType::all(['id', 'name'])]);
        });

        // Меню в шапке
        \View::composer('layouts.header_menu', function($view) {
            $view->with(['top_menu' => \Menu::getByName('Верхнее меню')]);
        });

        // Меню в подвале
        \View::composer('layouts.footer', function($view) {
            $view->with(['buttom_menu' => \Menu::getByName('Меню в подвале')]);
        });

        // Количество новых заявок
        \View::composer('admin.layouts.sidebar', function($view) {
            $view->with(['quantity_new_bids' => Bid::where('new_state', '1')->count()]);
        });

        // Цены для формы заявки
        \View::composer(['parts.bid_form', 'parts.script_for_bid'], function($view) {
            $view->with(['competitions' => Competition::with(['type'])->get()->toArray()]);
            $view->with(['age_groups' => AgeGroup::all(['id', 'name', 'price', 'type'])->toArray()]);
            $view->with(['nominations' => Nomination::all(['id', 'name', 'type'])->toArray()]);
            $view->with(['tariffs' => Tariff::all(['id', 'price', 'name', 'duration', 'selected', 'type'])->toArray()]);
            $view->with(['countries' => Country::all(['id', 'name', 'postage_price'])->toArray()]);
            $price = Price::first();
            if (!$price){
                $price = $this->mock_obj();
            }
            $view->with(['price' => $price]);
        });

        // Служебные страницы в шапке
        \View::composer('layouts.header_menu', function($view) {
            $view->with(['info_pages' => Page::all(['slug', 'name'])]);
        });
    }


    private function mock_obj()
    {
        $class = new \stdClass();
        $price = [
            'id' => 1,
            'thanks_teacher' => 0,
            'diploma' => 0,
            'diploma_kollective_electro' => 0,
            'diploma_print_solist' => 0,
            'diploma_print_kollective' => 0,
            'general_diplom_print' => 0,
            'discount' => 0,
            'cnt_person' => 0,
            'max_quantity_participants_price' => 0,
        ];

        foreach ($price as $var => $value){
            $class->$var = $value;
        }

        return $class;
    }
}
