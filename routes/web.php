<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentalCaseController;

Route::get('/', [UserController::class, "index"])->name('index');


Route::controller(PatientController::class)->group(function () {
    Route::get('patients', 'showall')->name("patients.showall");
    Route::get('patients/add', 'showadd')->name("patients.showadd");
    Route::post('patients/store', 'store')->name("patients.store");

});

Route::controller(DoctorController::class)->group(function () {
    Route::get('doctors', 'showall')->name("doctors.showall");
    Route::get('doctors/add', 'showadd')->name("doctors.showadd");
});

Route::controller(AppointmentController::class)->group(function () {
    Route::get('appointments', 'showall')->name("appointments.showall");
    Route::get('appointments/add', 'showadd')->name("appointments.showadd");
});

Route::controller(DentalCaseController::class)->group(function () {
    Route::get('cases', 'showall')->name("cases.showall");
    Route::get('cases/add', 'showadd')->name("cases.showadd");
});
