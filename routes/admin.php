<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes For Admin
|--------------------------------------------------------------------------
*/

Route::name('admin.')->prefix('/admin')->middleware(['web'])->group(function () {  
    /* ========== Login Routes ========== */
    Route::controller(LoginController::class)->group(function () {
        Route::get('/','index')->name('login');
        Route::post('/login','adminLogin')->name('login.post');
        Route::get('/logout','logout')->name('logout');

    });

    Route::group(['middleware' => ['prevent_back','admin_login_auth']], function() {
        /* ========== Dashboard Routes ========== */
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard','index')->name('dashboard');
            Route::get('/book','book')->name('book');
            Route::post('/createBook','createBook')->name('createBook');
            Route::post('/deleteBook','deleteBook')->name('deleteBook');
            Route::post('/updateBook','updateBook')->name('updateBook');
         });
        });
});
