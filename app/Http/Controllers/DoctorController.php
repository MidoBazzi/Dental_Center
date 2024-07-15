<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;


class DoctorController extends Controller
{
    public function showall(){
        $doctors = Doctor::get();
        return view('doctor.doctors_list',compact('doctors'));
    }
    public function showadd(){
        return view('doctor.add_doctor');
    }



}
