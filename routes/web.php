<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

// жюри, вопросы/ответы и 404


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('front.home');
//Route::get('/test', [App\Http\Controllers\UserController::class, 'index']);


Route::prefix('admin')->group(function (){
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
});
