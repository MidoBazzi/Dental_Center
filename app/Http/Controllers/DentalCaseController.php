<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DentalCaseController extends Controller
{
    public function showall(){
        return view('case.cases_list');
    }
    public function showadd(){
        return view('case.add_case');
    }
}
