<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaterialPayment;
use App\Http\Requests\AddMaterialRequest;

class MaterialController extends Controller
{
    public function showall(){
        $materials =  MaterialPayment::get();
        return view('material_payment.material_payments_list',compact('materials'));
    }
    public function showadd(){
        return view('material_payment.add_material_payment');
    }
    public function store(AddMaterialRequest $request){

        $material = new MaterialPayment;
        $material->date = $request->nadateme;
        $material->desc = $request->desc;
        $material->price = $request->price;


        $doctor->save();

        return redirect(route('materials.showall'));
    }
}
