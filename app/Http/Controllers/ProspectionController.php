<?php

namespace App\Http\Controllers;

use App\Models\prospection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProspectionController extends Controller
{
    public function index(){
        $prospections = prospection::all();
        foreach($prospections as $prospection){
            $prospection->client;
        }
        return response()->json($prospections,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'nomPdv'=>'required|string',
            'nom'=>'required|string',
            'telephone'=>'required|string',
            'categorie'=>'required|string',
            'quartier'=>'required|string',
            'zone'=>'required|string',
            'zone'=>'required|string',
            'observations'=>'required|string',
            'idcommerciaux'=>'required|number',
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $prospection = prospection::create($validators->validated());
        return response()->json($prospection,200);
    }
    public function find($id){
        $prospection = prospection::find($id);
        if(is_null($prospection)){
            return response()->json([
                'message'=>'aucune prospection correspondante!'
            ]);
        }
        return response()->json($prospection,200);
    }
    public function update(Request $request, $id){
        $prospection = prospection::find($id);
        if(is_null($prospection)){
            return response()->json(['message'=>'aucune prospection']);
        }
        $prospection_update = $prospection->update($request->all());
        return response()->json($prospection_update,200);
    }
    public function delete($id){
          $prospection = prospection::find($id);
          if(is_null($prospection)){
            return response()->json(['message'=>'aucune prospection correspondante']);
          }
          $prospection = $prospection->delete();
          return response()->json($prospection);
    }
}
