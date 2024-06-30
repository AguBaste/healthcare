<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\DiabeteController;
use App\Http\Controllers\PressureController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AlergyController;
use App\Http\Controllers\UsersAlergyController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\PrescriptionController;







use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');









Route::middleware(['auth'])->group(function () {


Route::get('/directorDash', function () {
    return view('directorDash');
})->middleware('director')->name('directorDash');

Route::get('/providerDash', function () {
    return view('providerDash');
})->middleware('provider')->name('providerDash');

Route::get('/secretaryDash', function () {
    return view('secretaryDash');
})->middleware('secretary')->name('secretaryDash');

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
    Route::resource('alergy',AlergyController::class);
    Route::resource('diagnostic',DiagnosticController::class)->middleware('provider');
    Route::resource('prescription',PrescriptionController::class)->middleware('provider');
    Route::resource('provider',ProviderController::class);

});

require __DIR__.'/auth.php';
