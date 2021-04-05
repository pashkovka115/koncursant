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

// Контакты
Route::get('contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('front.contacts.index');

// Заявка на участие в конкурсе
Route::prefix('bid')->group(function (){
    // Форма
    Route::prefix('form')->group(function (){
        Route::get('', [\App\Http\Controllers\BidController::class, 'create'])->name('front.bid.form.create');
        Route::post('store', [\App\Http\Controllers\BidController::class, 'store'])->name('front.bid.form.store');
    });
});





// Админ панель
Route::group(['middleware'=>\App\Http\Middleware\CheckRole::class, 'roles'=>['Admin'], 'prefix'=>'admin'],function (){
    Route::get('', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');

    // Заявки
    Route::prefix('bids')->group(function (){
        Route::get('new', [\App\Http\Controllers\Admin\BidController::class, 'new_bids'])->name('admin.bids.new_bids');

        Route::get('', [\App\Http\Controllers\Admin\BidController::class, 'index'])->name('admin.bids.index');
        Route::get('competitions/{type}', [\App\Http\Controllers\Admin\BidController::class, 'index_type'])->name('admin.bids.index_type');
        Route::get('competitions/concrete/{competition_id}', [\App\Http\Controllers\Admin\BidController::class, 'competition'])->name('admin.bids.concrete.competition');

        Route::get('edit/{id}', [\App\Http\Controllers\Admin\BidController::class, 'edit'])->name('admin.bids.edit');
        Route::post('update/{id}', [\App\Http\Controllers\Admin\BidController::class, 'update'])->name('admin.bids.update');
        Route::post('destroy/{id}', [\App\Http\Controllers\Admin\BidController::class, 'destroy'])->name('admin.bids.destroy');
//        Route::post('store', [\App\Http\Controllers\Admin\BidController::class, 'store'])->name('admin.bids.store');
    });

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
        // Тип конкурса
        Route::prefix('types')->group(function (){
            Route::get('', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'index'])->name('admin.competitions.types.index');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'edit'])->name('admin.competitions.types.edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'update'])->name('admin.competitions.types.update');
            Route::post('destroy/{id}', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'destroy'])->name('admin.competitions.types.destroy');
            Route::post('store', [\App\Http\Controllers\Admin\CompetitionTypeController::class, 'store'])->name('admin.competitions.types.store');
        });
        // Возрастная группа
        Route::prefix('age-group')->group(function (){
            Route::get('', [\App\Http\Controllers\Admin\AgeGroupController::class, 'index'])->name('admin.competitions.age_group.index');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\AgeGroupController::class, 'edit'])->name('admin.competitions.age_group.edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\AgeGroupController::class, 'update'])->name('admin.competitions.age_group.update');
            Route::post('destroy/{id}', [\App\Http\Controllers\Admin\AgeGroupController::class, 'destroy'])->name('admin.competitions.age_group.destroy');
            Route::post('store', [\App\Http\Controllers\Admin\AgeGroupController::class, 'store'])->name('admin.competitions.age_group.store');
        });
        // Все конкурсы
        Route::prefix('all')->group(function (){
            Route::get('type/{id}', [\App\Http\Controllers\Admin\CompetitionController::class, 'indexCompetitionType'])->name('admin.competitions.all.index_competition_type');

            Route::get('', [\App\Http\Controllers\Admin\CompetitionController::class, 'index'])->name('admin.competitions.all.index');
            Route::get('create', [\App\Http\Controllers\Admin\CompetitionController::class, 'create'])->name('admin.competitions.all.create');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\CompetitionController::class, 'edit'])->name('admin.competitions.all.edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\CompetitionController::class, 'update'])->name('admin.competitions.all.update');
            Route::post('destroy/{id}', [\App\Http\Controllers\Admin\CompetitionController::class, 'destroy'])->name('admin.competitions.all.destroy');
            Route::post('store', [\App\Http\Controllers\Admin\CompetitionController::class, 'store'])->name('admin.competitions.all.store');

            Route::post('attach-age-group/{competition_id}', [\App\Http\Controllers\Admin\CompetitionController::class, 'attachAgeGroup'])->name('admin.competitions.all.attach_age_group');
            Route::post('detach-age-group/{competition_id}', [\App\Http\Controllers\Admin\CompetitionController::class, 'detachAgeGroup'])->name('admin.competitions.all.detach_age_group');
        });
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

        // Контакты
        Route::prefix('contacts')->group(function () {
            Route::get('', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.pages.contacts.index');
            Route::get('edit/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'edit'])->name('admin.pages.contacts.edit');
            Route::post('update/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'update'])->name('admin.pages.contacts.update');
        });
    });

    // Настройки
    Route::prefix('settings')->group(function (){
        // Меню
        Route::prefix('menu')->group(function () {
            Route::get('', [\App\Http\Controllers\Admin\MenuController::class, 'index'])->name('admin.settings.menu.index');
        });
    });
});
