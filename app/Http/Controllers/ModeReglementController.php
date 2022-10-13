<?php

namespace App\Http\Controllers;

use App\Models\mode_reglement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModeReglementController extends Controller
{
    
    public function index(){
        $mode_reglements = mode_reglement::paginate(15);
        return response()->json($mode_reglements,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'intitule'=>'required|string'
            
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $mode_reglement = mode_reglement::create($validators->validated());
        return response()->json($mode_reglement,200);
    }
    public function find($id){
        $mode_reglement = mode_reglement::find($id);
        if(is_null($mode_reglement)){
            return response()->json([
                'message'=>'aucune mode_reglement correspondante!'
            ]);
        }
        return response()->json($mode_reglement,200);
    }
    public function update(Request $request, $id){
        $mode_reglement = mode_reglement::find($id);
        if(is_null($mode_reglement)){
            return response()->json(['message'=>'aucune mode_reglement']);
        }
        $mode_reglement_update = $mode_reglement->update($request->all());
        return response()->json($mode_reglement_update,200);
    }
    public function delete($id){
          $mode_reglement = mode_reglement::find($id);
          if(is_null($mode_reglement)){
            return response()->json(['message'=>'aucune mode_reglement correspondante']);
          }
          $mode_reglement = $mode_reglement->delete();
          return response()->json($mode_reglement);
    }
}
