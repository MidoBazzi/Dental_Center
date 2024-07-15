<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;

class AutocompleteController extends Controller
{
    public function getDoctors(Request $request)
    {
        $search = $request->query('q');
        $doctors = Doctor::where('name', 'LIKE', "%{$search}%")->pluck('name');
        return response()->json($doctors);
    }

    public function getPatients(Request $request)
    {
        $search = $request->query('q');
        $patients = Patient::where('name', 'LIKE', "%{$search}%")->pluck('name');
        return response()->json($patients);
    }
}

