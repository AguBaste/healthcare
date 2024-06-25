<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiabeteController;
use App\Http\Controllers\PressureController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AppointmentController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas mias
    Route::resource('chart',ChartController::class);
    Route::resource('diabete',DiabeteController::class);
    Route::resource('pressure',PressureController::class);
    Route::resource('appointemnt',AppointmentController::class);

});

require __DIR__.'/auth.php';
