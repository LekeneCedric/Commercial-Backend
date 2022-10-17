<?php

namespace App\Http\Controllers;

use App\Models\rayon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RayonController extends Controller
{
    
    public function index(){
        $rayons = rayon::paginate(15);
        return response()->json($rayons,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
        'intitule'=>'required|string',
            
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $rayon = rayon::create($validators->validated());
        return response()->json($rayon,200);
    }
    public function find($id){
        $rayon = rayon::find($id);
        if(is_null($rayon)){
            return response()->json([
                'message'=>'aucune rayon correspondante!'
            ]);
        }
        return response()->json($rayon,200);
    }
    public function update(Request $request, $id){
        $rayon = rayon::find($id);
        if(is_null($rayon)){
            return response()->json(['message'=>'aucune rayon']);
        }
        $rayon_update = $rayon->update($request->all());
        return response()->json($rayon_update,200);
    }
    public function delete($id){
          $rayon = rayon::find($id);
          if(is_null($rayon)){
            return response()->json(['message'=>'aucune rayon correspondante']);
          }
          $rayon = $rayon->delete();
          return response()->json($rayon);
    }
}
