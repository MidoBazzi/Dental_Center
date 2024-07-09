<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function showall(){
        return view('appointment.appointments_list');
    }
    public function showadd(){
        return view('appointment.add_appointment');
    }
}
