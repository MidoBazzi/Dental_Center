<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddPatientRequest;
use App\Models\Patient;

class PatientController extends Controller
{
    public function showall(){
        $patients = Patient::get();
        return view('patient.patients_list',compact('patients'));
    }
    public function showadd(){
        return view('patient.add_patient');
    }
    public function store(AddPatientRequest $request){

        $patient = new Patient;
        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->phone_num = $request->phone_num;
        $patient->age = $request->age;
        $patient->save();

        return redirect(route('patients.showall'));
    }


}
