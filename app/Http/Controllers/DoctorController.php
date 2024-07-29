<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\DoctorPayment;
use Illuminate\Support\Carbon;

class DoctorController extends Controller
{
    public function showall() {
        $doctors = Doctor::get();
        return view('doctor.doctors_list', compact('doctors'));
    }

    public function showadd() {
        return view('doctor.add_doctor');
    }

    public function paymentHistory() {
        return view('doctor.doctor_payment_history');
    }

    public function store(AddDoctorRequest $request) {
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


    public function create_payment(Request  $request)
    {
        $validatedData = $request->validate([
        'doctor_id' => ['required', 'integer', 'exists:doctors,id'],
        'amount' => ['required', 'integer', 'min:1'],
        ]);

        $doctor = Doctor::find($request->doctor_id);
        $amount_due = $doctor->amount_due;
        if($request->amount > $amount_due){
            return redirect()->back()->withErrors(['error' => 'The amount paid is more than the amount due for the dcotor.']);
        }
        $now = Carbon::now();
        $payment = new DoctorPayment;
        $payment->date = $now;
        $payment->doctor_id = $request->doctor_id;
        $payment->amount = $request->amount;




        $doctor->amount_due -= $request->amount ;

        $doctor->save();
        $payment->save();

        return redirect(route('doctors.showall'));
    }

    public function viewPayments($doctor_id){
        $doctor = Doctor::findorfail($doctor_id);
        $payments = $doctor->doctorpayments;

        return view('doctor.doctor_payment_history',compact('payments','doctor'));

    }


    public function availableDates(Request $request) {
        $doctorId = $request->get('doctor_id');
        $doctor = Doctor::find($doctorId);

        $availableDays = explode(',', $doctor->schedule);
        $next7Days = [];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i);
            if (in_array($date->format('l'), $availableDays)) {
                $next7Days[] = $date->format('Y-m-d');
            }
        }

        return response()->json($next7Days);
    }

    public function availableTimes(Request $request) {
        $doctorId = $request->get('doctor_id');
        $date = $request->get('date');
        $duration = Carbon::parse($request->get('duration'))->diffInMinutes(Carbon::parse('00:00:00'));

        $doctor = Doctor::find($doctorId);
        $appointments = Appointment::where('doctor_id', $doctorId)
                                   ->whereDate('date', $date)
                                   ->get();

        $availableTimes = [];
        $startTime = Carbon::parse($doctor->shift_start);
        $endTime = Carbon::parse($doctor->shift_end);

        while ($startTime->addMinutes($duration)->lessThanOrEqualTo($endTime)) {
            $available = true;
            foreach ($appointments as $appointment) {
                $appointmentTime = Carbon::parse($appointment->time);
                if ($startTime->between($appointmentTime, $appointmentTime->copy()->addMinutes($duration))) {
                    $available = false;
                    break;
                }
            }

            if ($available) {
                $availableTimes[] = $startTime->format('H:i');
            }
            $startTime->subMinutes($duration)->addMinutes(30); // Assuming appointments are in 30-minute slots
        }

        return response()->json($availableTimes);
    }
}
