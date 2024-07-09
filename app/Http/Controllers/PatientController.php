<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function showall(){
        return view('patient.patients_list');
    }
    public function showadd(){
        return view('patient.add_patient');
    }

}
