<?php

namespace App\Http\Controllers;

use App\Models\tva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TvaController extends Controller
{
    public function index(){
        $tvas = tva::paginate(15);
        return response()->json($tvas,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'valeur'=>'required',
            'idpays'=>'required'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $tva = tva::create($validators->validated());
        return response()->json($tva,200);
    }
    public function find($id){
        $tva = tva::find($id);
        if(is_null($tva)){
            return response()->json([
                'message'=>'aucune tva correspondante!'
            ]);
        }
        return response()->json($tva,200);
    }
    public function update(Request $request, $id){
        $tva = tva::find($id);
        if(is_null($tva)){
            return response()->json(['message'=>'aucune tva']);
        }
        $tva_update = $tva->update($request->all());
        return response()->json($tva_update,200);
    }
    public function delete($id){
          $tva = tva::find($id);
          if(is_null($tva)){
            return response()->json(['message'=>'aucune tva correspondante']);
          }
          $tva = $tva->delete();
          return response()->json($tva);
    }
}
