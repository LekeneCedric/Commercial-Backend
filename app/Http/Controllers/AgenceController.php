<?php

namespace App\Http\Controllers;

use App\Models\agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgenceController extends Controller
{
    public function index(){
        $agences =  agence::all();
        return response()->json($agences,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'intitule'=>'required|string',
            'description'=>'required|string'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $agence = agence::create($validators->validated());
        return response()->json($agence,200);
    }
    public function find($id){
        $agence = agence::find($id);
        if(is_null($agence)){
            return response()->json([
                'message'=>'aucune agence correspondante!'
            ]);
        }
        return response()->json($agence,200);
    }
    public function update(Request $request, $id){
        $agence = agence::find($id);
        if(is_null($agence)){
            return response()->json(['message'=>'aucune agence']);
        }
        $agence_update = $agence->update($request->all());
        return response()->json($agence_update,200);
    }
    public function delete($id){
          $agence = agence::find($id);
          if(is_null($agence)){
            return response()->json(['message'=>'aucune agence correspondante']);
          }
          $agence = $agence->delete();
          return response()->json($agence);
    }
}
