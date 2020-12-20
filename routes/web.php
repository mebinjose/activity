<?php

use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class, 'home']);

Route::get('/activities', [HomeController::class,'activities'])->middleware(['auth'])->name('dashboard');

Route::get('/fetch-more', [HomeController::class,'fetchMore'])->middleware('auth')->name('fetch-more');

Route::post('/activity/{id}/update', [HomeController::class,'update'])->middleware('auth')->name('update-activity');

Route::post('/activity/{id}/delete', [HomeController::class,'delete'])->middleware(['auth', 'admin'])->name('delete');

Route::get('/admin', [HomeController::class,'admin'])->middleware(['auth', 'admin'])->name('admin');

require __DIR__.'/auth.php';
