<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentalcase;
use App\Models\Doctor;
use App\Models\Patient;
use App\Http\Requests\AddCaseRequest;

class DentalCaseController extends Controller
{
    public function showall(){
        $cases = Dentalcase::with('doctor', 'patient')->get();

        return view('case.cases_list',compact('cases'));
    }
    public function showadd(){
        return view('case.add_case');
    }
    public function showold(){
        return view('case.old_cases');
    }
    public function store(AddCaseRequest $request){

        $case = new Dentalcase;
        $case->desc = $request->desc;
        $case->doctor_id = $request->doctor_id;
        $case->patient_id = $request->patient_id;
        $case->amount = $request->amount;


        $case->save();

        return redirect(route('cases.showall'));
    }

}
