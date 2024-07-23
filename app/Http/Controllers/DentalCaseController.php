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

        $case = Dentalcase::find($request->dentalcase_id);
        $amount_paid = $case->payments->sum('amount');
        if($amount_paid + $request->amount > $case->amount){
            return redirect()->back()->withErrors(['error' => 'The total amount paid is more than the case cost.']);
        }
        $now = Carbon::now();
        $payment = new Payment;
        $payment->date = $now;
        $payment->dentalcase_id = $request->dentalcase_id;
        $payment->amount = $request->amount;



        $doctor = $case->doctor;
        $doctor->amount_due = $request->amount * ($doctor->cut / 100);

        $doctor->save();
        $payment->save();

        return redirect(route('cases.showall'));
    }

    public function viewPayments($case_id){
        $case = Dentalcase::findorfail($case_id);
        $payments = $case->payments;

        return view('case.payment_history',compact('payments','case'));

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


    public function autocompletePatients(Request $request)
    {
        $query = $request->get('q');
        $patients = Patient::where('name', 'LIKE', "%{$query}%")->get(['id', 'name']);
        return response()->json($patients);
    }

    public function autocompleteCases(Request $request)
    {
        $patientId = $request->get('patient_id');
        $cases = Dentalcase::where('patient_id', $patientId)->where('status', false)->with('doctor')->get(['id', 'desc', 'doctor_id']);
        $cases->load('doctor:id,name'); // Eager load only necessary fields
        return response()->json($cases);
    }


    public function showAddPhotoForm($caseId)
    {
        $case = Dentalcase::findOrFail($caseId);
        return view('case.add_photo', compact('case'));
    }

    public function storePhoto(Request $request, $caseId)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
        ]);

        $case = Dentalcase::findOrFail($caseId);

        // Store the photo
        $path = $request->file('photo')->store('public/photos');

        // Save the photo path and description in the database
        $case->photos()->create([
            'path' => $path,
            'description' => $request->description,
        ]);

        return redirect()->route('cases.showall')->with('success', 'Photo and description added successfully.');
    }


}


