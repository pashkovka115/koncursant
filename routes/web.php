<?php

use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false,
]);




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('front.home');

// Жюри фронт
Route::prefix('jury')->group(function (){
    Route::get('', [\App\Http\Controllers\JuryController::class, 'index'])->name('front.jury.index');
    Route::get('{slug}', [\App\Http\Controllers\JuryController::class, 'show'])->name('front.jury.show');
});

// Вопрос - ответ фронт
Route::prefix('faq')->group(function (){
    Route::get('', [\App\Http\Controllers\FaqController::class, 'index'])->name('front.faq.index');
});







// Админ панель
Route::group(['middleware'=>\App\Http\Middleware\CheckRole::class, 'roles'=>['Admin'], 'prefix'=>'admin'],function (){
    Route::get('', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');

    // Жюри
    Route::prefix('jury')->group(function (){
        Route::get('', [\App\Http\Controllers\Admin\JuryController::class, 'index'])->name('admin.jury.index');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\JuryController::class, 'edit'])->name('admin.jury.edit');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\JuryController::class, 'update'])->name('admin.jury.update');
        Route::post('destroy/{id}', [\App\Http\Controllers\Admin\JuryController::class, 'destroy'])->name('admin.jury.destroy');
        Route::post('store', [\App\Http\Controllers\Admin\JuryController::class, 'store'])->name('admin.jury.store');
    });

    // Вопрос - ответ
    Route::prefix('questions')->group(function (){
        Route::get('', [\App\Http\Controllers\Admin\QuestionController::class, 'index'])->name('admin.questions.index');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\QuestionController::class, 'edit'])->name('admin.questions.edit');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\QuestionController::class, 'update'])->name('admin.questions.update');
        Route::post('destroy/{id}', [\App\Http\Controllers\Admin\QuestionController::class, 'destroy'])->name('admin.questions.destroy');
        Route::post('store', [\App\Http\Controllers\Admin\QuestionController::class, 'store'])->name('admin.questions.store');
    });

    // Конкурсы
    Route::prefix('competitions')->group(function (){
        // Тип конкурса todo: временно отключил (ещё не доделал)
        /*Route::prefix('types')->group(function (){
            Route::get('', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'index'])->name('admin.competitions.types.index');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'edit'])->name('admin.competitions.types.edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'update'])->name('admin.competitions.types.update');
            Route::post('destroy/{id}', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'destroy'])->name('admin.competitions.types.destroy');
            Route::post('store', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'store'])->name('admin.competitions.types.store');
        });*/
    });

    // Страницы
    Route::prefix('pages')->group(function () {
        // Информационные страницы
        Route::prefix('info')->group(function () {
            Route::get('', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('admin.pages.info.index');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\PageController::class, 'edit'])->name('admin.pages.info.edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\PageController::class, 'update'])->name('admin.pages.info.update');
            Route::post('destroy/{id}', [\App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('admin.pages.info.destroy');
            Route::post('store', [\App\Http\Controllers\Admin\PageController::class, 'store'])->name('admin.pages.info.store');
        });
    });
});
