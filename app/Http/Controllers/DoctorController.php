<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Http\Requests\AddDoctorRequest;

class DoctorController extends Controller
{
    public function showall(){
        $doctors = Doctor::get();
        return view('doctor.doctors_list',compact('doctors'));
    }
    public function showadd(){
        return view('doctor.add_doctor');
    }

    public function paymentHistory()
    {
        return view('doctor.doctor_payment_history', compact('doctor', 'payments'));
    }


    public function store(AddDoctorRequest $request){

        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->address = $request->address;
        $doctor->phone_num = $request->phone_num;
        $doctor->age = $request->age;
        $doctor->speciality = $request->speciality;
        $doctor->schedule = $request->schedule;
        $doctor->shift_start = $request->shift_start;
        $doctor->shift_end = $request->shift_end;
        $doctor->cut = $request->cut;

        $doctor->save();

        return redirect(route('doctors.showall'));
    }


}
