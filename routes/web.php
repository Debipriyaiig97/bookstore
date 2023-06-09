<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('frontend.index');
    Route::get('/search', 'search')->name('frontend.search');
});
/* 
|--------------------------------------------------------------------------
| Web Routes For Admin
|--------------------------------------------------------------------------
*/

require __DIR__. '/admin.php';