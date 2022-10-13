<?php

namespace App\Http\Controllers;

use App\Models\prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProspectController extends Controller
{
    public function index(){
        $prospects = prospect::paginate(15);
        return response()->json($prospects,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'type'=>'required|string',
            'nom'=>'required|string',
            'email'=>'required|email',
            'password'=>'required',
            'telephone'=>'required|string',
            'adresse'=>'required|string',
            'siteweb'=>'required|string',
            'etat'=>'required|int',
            'evenement'=>'required|string',
            'num_contri'=>'required|string',
            'registre'=>'required|string',
            'isclient'=>'required|int',
            'idpays'=>'required|int',
            'idcategorie'=>'required|int',
            'idprospecteur'=>'required|int'
            
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $prospect = prospect::create($validators->validated());
        return response()->json($prospect,200);
    }
    public function find($id){
        $prospect = prospect::find($id);
        if(is_null($prospect)){
            return response()->json([
                'message'=>'aucune prospect correspondante!'
            ]);
        }
        return response()->json($prospect,200);
    }
    public function update(Request $request, $id){
        $prospect = prospect::find($id);
        if(is_null($prospect)){
            return response()->json(['message'=>'aucune prospect']);
        }
        $prospect_update = $prospect->update($request->all());
        return response()->json($prospect_update,200);
    }
    public function delete($id){
          $prospect = prospect::find($id);
          if(is_null($prospect)){
            return response()->json(['message'=>'aucune prospect correspondante']);
          }
          $prospect = $prospect->delete();
          return response()->json($prospect);
    }
}
