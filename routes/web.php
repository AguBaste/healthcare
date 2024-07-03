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
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\OrderController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth'])->group(function () {

Route::get('/error',function(){
    return view('error');
})->name('error');

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
    Route::post('chart/onlyChart',[ChartController::class,'onlyChart'])->middleware('provider')->name('chart.onlyChart');
    Route::resource('diabete',DiabeteController::class);
    Route::resource('pressure',PressureController::class);
    Route::resource('appointment',AppointmentController::class)->middleware('prosec');
    Route::resource('schedule',ScheduleController::class);
    Route::resource('alergy',AlergyController::class);
    Route::resource('prescription',PrescriptionController::class)->middleware('provider');
    Route::post('prescription/onlyPrescription',[PrescriptionController::class,'onlyPrescription'])->middleware('prosec')->name('prescription.onlyPrescription');
    Route::post('prescription/paciente',[PrescriptionController::class,'search'])->middleware('provider')->name('prescription.search');
    Route::resource('provider',ProviderController::class);
    Route::resource('patient',PatientController::class)->middleware('secretary');
    Route::resource('order',OrderController::class)->middleware('prosec');    
    Route::post('order/onlyOrder',[OrderController::class,'onlyOrder'])->middleware('prosec')->name('order.onlyOrder');
    Route::post('order/paciente',[OrderController::class,'search'])->middleware('provider')->name('order.search');

});

require __DIR__.'/auth.php';
