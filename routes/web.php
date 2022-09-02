<?php

use App\Http\Controllers\CatatanController;
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
Route::post('tambah', [CatatanController::class, 'store'])->name('tambah');
Route::post('edit', [CatatanController::class, 'edit'])->name('edit');
Route::post('update', [CatatanController::class, 'update'])->name('update');
Route::post('delete', [CatatanController::class, 'destroy'])->name('delete');
Route::patch('/{id}', [CatatanController::class, 'isDone']);



