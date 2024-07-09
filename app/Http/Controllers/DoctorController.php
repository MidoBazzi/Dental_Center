<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function showall(){
        return view('doctor.doctors_list');
    }
    public function showadd(){
        return view('doctor.add_doctor');
    }

}
