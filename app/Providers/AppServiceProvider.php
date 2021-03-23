<?php

namespace App\Providers;

use App\Models\CompetitionType;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
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
    }
}
