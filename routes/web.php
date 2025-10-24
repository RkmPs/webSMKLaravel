<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SummaryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('siswa', StudentController::class);

Route::get('/rangkuman', [SummaryController::class, 'index'])->name('rangkuman.index');

Route::get('/about', function () {
    return view('about');
})->name('about');