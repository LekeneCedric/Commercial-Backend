<?php

namespace App\Http\Controllers;

use App\Models\ficheSortie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FicheSortieController extends Controller
{
    public function index(){
        $ficheSorties = ficheSortie::paginate(15);
        return response()->json($ficheSorties,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
        'idcommercial'=>'required',
        'idarticle'=>'required',
        'quantite'=>'required'
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $ficheSortie = ficheSortie::create($validators->validated());
        return response()->json($ficheSortie,200);
    }
    public function find($id){
        $ficheSortie = ficheSortie::find($id);
        if(is_null($ficheSortie)){
            return response()->json([
                'message'=>'aucune ficheSortie correspondante!'
            ]);
        }
        return response()->json($ficheSortie,200);
    }
    public function update(Request $request, $id){
        $ficheSortie = ficheSortie::find($id);
        if(is_null($ficheSortie)){
            return response()->json(['message'=>'aucune ficheSortie']);
        }
        $ficheSortie_update = $ficheSortie->update($request->all());
        return response()->json($ficheSortie_update,200);
    }
    public function delete($id){
          $ficheSortie = ficheSortie::find($id);
          if(is_null($ficheSortie)){
            return response()->json(['message'=>'aucune ficheSortie correspondante']);
          }
          $ficheSortie = $ficheSortie->delete();
          return response()->json($ficheSortie);
    }
}
