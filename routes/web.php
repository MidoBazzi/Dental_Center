<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;


Route::get('/', [UserController::class, "index"])->name('index');


Route::controller(PatientController::class)->group(function () {
    Route::get('patients', 'showall')->name("patients.showall");
    Route::get('patients/add', 'showadd')->name("patients.showadd");
});


