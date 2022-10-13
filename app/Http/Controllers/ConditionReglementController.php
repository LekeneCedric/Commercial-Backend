<?php

namespace App\Http\Controllers;

use App\Models\condition_reglement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConditionReglementController extends Controller
{
    public function index(){
        $condition_reglements =  condition_reglement::paginate(15);
        return response()->json($condition_reglements,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'nom'=>'required|string',
            'logo'=>'required|string'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $condition_reglement = condition_reglement::create($validators->validated());
        return response()->json($condition_reglement,200);
    }
    public function find($id){
        $condition_reglement = condition_reglement::find($id);
        if(is_null($condition_reglement)){
            return response()->json([
                'message'=>'aucune condition_reglement correspondante!'
            ]);
        }
        return response()->json($condition_reglement,200);
    }
    public function update(Request $request, $id){
        $condition_reglement = condition_reglement::find($id);
        if(is_null($condition_reglement)){
            return response()->json(['message'=>'aucune condition_reglement']);
        }
        $condition_reglement_update = $condition_reglement->update($request->all());
        return response()->json($condition_reglement_update,200);
    }
    public function delete($id){
          $condition_reglement = condition_reglement::find($id);
          if(is_null($condition_reglement)){
            return response()->json(['message'=>'aucune condition_reglement correspondante']);
          }
          $condition_reglement = $condition_reglement->delete();
          return response()->json($condition_reglement);
    }
}
