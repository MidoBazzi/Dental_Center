<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function showall(){
        return view('material_payment.material_payments_list');
    }
    public function showadd(){
        return view('material_payment.add_material_payment');
    }
}
