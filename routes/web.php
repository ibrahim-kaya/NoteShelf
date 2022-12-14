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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\MainController::class, 'index'])->name('homepage');

    Route::resource('notes', \App\Http\Controllers\NoteController::class)->name('*', 'notes');
    Route::post('note/get-note', [\App\Http\Controllers\NoteController::class, 'getNote'])->name('notes.get-note');
});

require __DIR__.'/auth.php';
