<?php

namespace App\Http\Controllers;

use App\Models\pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaysController extends Controller
{
    public function index(){
        $payss = pays::paginate(15);
        return response()->json($payss,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'code'=>'required|int',
            'alpha2'=>'required|string',
            'alpha3'=>'required|string',
            'nom_en_gb'=>'required|string',
            'intitule'=>'required|string',
            'tva'=>'required|int'
            
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $pays = pays::create($validators->validated());
        return response()->json($pays,200);
    }
    public function find($id){
        $pays = pays::find($id);
        if(is_null($pays)){
            return response()->json([
                'message'=>'aucune pays correspondante!'
            ]);
        }
        return response()->json($pays,200);
    }
    public function update(Request $request, $id){
        $pays = pays::find($id);
        if(is_null($pays)){
            return response()->json(['message'=>'aucune pays']);
        }
        $pays_update = $pays->update($request->all());
        return response()->json($pays_update,200);
    }
    public function delete($id){
          $pays = pays::find($id);
          if(is_null($pays)){
            return response()->json(['message'=>'aucune pays correspondante']);
          }
          $pays = $pays->delete();
          return response()->json($pays);
    }
}
