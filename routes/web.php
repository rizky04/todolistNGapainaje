<?php

use App\Http\Controllers\CatatanController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\CatetanController;
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

Route::get('/', [CatatanController::class, 'index'])->name('index');


Route::resource('/categori', CategoriController::class);
Route::resource('/catetan', CatetanController::class);
