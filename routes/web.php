<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiabeteController;
use App\Http\Controllers\PressureController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ScheduleController;




use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');









Route::middleware(['auth'])->group(function () {


Route::get('/director', function () {
    return view('director');
})->middleware('director')->name('director');

Route::get('/provider', function () {
    return view('provider');
})->middleware('provider')->name('provider');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas mias
    Route::resource('chart',ChartController::class);
    Route::resource('diabete',DiabeteController::class);
    Route::resource('pressure',PressureController::class);
    Route::resource('appointment',AppointmentController::class);
    Route::resource('schedule',ScheduleController::class);

});

require __DIR__.'/auth.php';
