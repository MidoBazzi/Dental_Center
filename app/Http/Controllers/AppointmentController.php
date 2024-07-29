<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    public function showall() {
        $today = Carbon::now()->format('Y-m-d');

        $today_appointments = Appointment::with('patient','dentalcase','doctor')->whereDate('date', $today)
                                         ->orderBy('time', 'asc')
                                         ->get();

        $future_appointments = Appointment::with('patient','dentalcase','doctor')->whereDate('date', '>', $today)
                                          ->orderBy('date', 'asc')
                                          ->orderBy('time', 'asc')
                                          ->get();

        return view('appointment.appointments_list', compact('today_appointments', 'future_appointments'));
    }

    public function showadd(){
        return view('appointment.add_appointment');
    }
}
