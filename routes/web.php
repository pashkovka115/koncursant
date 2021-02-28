<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

// Route::get('/', function () {
//     return redirect('/index');
// });

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pages-404', 'NazoxController@index');
//Route::get('/', 'HomeController@root');
Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('{any}', 'HomeController@index');

Route::get('index/{locale}', 'LocaleController@lang');
