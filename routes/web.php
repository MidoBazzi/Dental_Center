<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentalCaseController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AutocompleteController;

Route::get('/', [UserController::class, "index"])->name('index');


Route::controller(PatientController::class)->group(function () {
    Route::get('patients', 'showall')->name("patients.showall");
    Route::get('patients/add', 'showadd')->name("patients.showadd");
    Route::post('patients/store', 'store')->name("patients.store");

});

Route::controller(DoctorController::class)->group(function () {
    Route::get('doctors', 'showall')->name("doctors.showall");
    Route::get('doctors/add', 'showadd')->name("doctors.showadd");
    Route::post('doctors/store', 'store')->name("doctors.store");

});

Route::controller(AppointmentController::class)->group(function () {
    Route::get('appointments', 'showall')->name("appointments.showall");
    Route::get('appointments/add', 'showadd')->name("appointments.showadd");
});

Route::controller(DentalCaseController::class)->group(function () {
    Route::get('cases', 'showall')->name("cases.showall");
    Route::get('cases/add', 'showadd')->name("cases.showadd");
    Route::get('cases/old', 'showold')->name("cases.showold");
    Route::post('cases/store', 'store')->name("cases.store");
    Route::post('cases/pay', 'create_payment')->name("cases.pay");
    Route::post('cases/end', 'endcase')->name("cases.end");
    Route::get('/cases/payments/{case_id}', 'viewPayments')->name('cases.payments');




});

Route::controller(MaterialController::class)->group(function () {
    Route::get('materials', 'showall')->name("materials.showall");
    Route::get('materials/add', 'showadd')->name("materials.showadd");
    Route::post('materials/store', 'store')->name("materials.store");

});
Route::get('/autocomplete/doctors', [AutocompleteController::class, 'getDoctors']);
Route::get('/autocomplete/patients', [AutocompleteController::class, 'getPatients']);

