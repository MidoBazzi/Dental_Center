<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentalcase;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Payment;
use App\Http\Requests\AddCaseRequest;
use Illuminate\Support\Carbon;

class DentalCaseController extends Controller
{
    public function showall(){
        $cases = Dentalcase::with('doctor', 'patient','payments')->get()->where('status',false);

        return view('case.cases_list',compact('cases'));
    }
    public function showadd(){
        return view('case.add_case');
    }
    public function showold(){
        $cases = Dentalcase::with('doctor', 'patient')->get()->where('status',true);

        return view('case.old_cases',compact('cases'));    }
    public function store(AddCaseRequest $request){

        $case = new Dentalcase;
        $case->desc = $request->desc;
        $case->doctor_id = $request->doctor_id;
        $case->patient_id = $request->patient_id;
        $case->amount = $request->amount;


        $case->save();

        return redirect(route('cases.showall'));
    }
    public function create_payment(Request  $request)
    {
        $validatedData = $request->validate([
        'dentalcase_id' => ['required', 'integer', 'exists:dentalcases,id'],
        'amount' => ['required', 'integer', 'min:1'],
        ]);
        $now = Carbon::now();
        $payment = new Payment;
        $payment->date = $now;
        $payment->dentalcase_id = $request->dentalcase_id;
        $payment->amount = $request->amount;


        $payment->save();

        return redirect(route('cases.showall'));
    }
    public function endcase(Request $request){
        $validatedData = $request->validate([
            "dentalcase_id" => "required|integer|exists:dentalcases,id",
        ]);
        $case = Dentalcase::find($request->dentalcase_id);
        $amount_paid = $case->payments->sum('amount');

        if($amount_paid < $case->amount){
            return redirect()->back()->withErrors(['error' => 'The total amount paid is less than the case amount.']);
        }
        $case->status= true;
        $case->save();

        return redirect(route('cases.showall'));
    }
}
