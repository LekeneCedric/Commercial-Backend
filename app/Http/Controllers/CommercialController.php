<?php

namespace App\Http\Controllers;

use App\Models\commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommercialController extends Controller
{
    public function index(){
        $commerciaux = commercial::paginate(15);
        return response()->json($commerciaux,200);
    }
    public function store(Request $request){
       $validator = Validator::make($request->all(),[
        'nom'=>'required|string',
        'prenom'=>'required|string',
        'email'=>'required|email',
        'phone'=>'required|string',
       ]);
       if($validator->fails()){
        return response()->json($validator->errors(),400);
       }
       $commercial = commercial::create(
        $validator->validated()
       );
       return response()->json($commercial,200);
    }
    public function update(Request $request,$id){
        $commercial = commercial::find($id);
        if(is_null($commercial)){
            return response()->json($commercial);
        }
        $commercial_update = $commercial->update($request->all());
        return response()->json($commercial_update,201);
    }
   
    public function find($id){
        $commercial = commercial::find($id);
        return $commercial;
    }
    public function delete($id){
        $commercial= commercial::find($id);
        if(is_null($commercial)){
            return response()->json($commercial);
        }
        $commercial = commercial::destroy($id);
        return response()->json([
            'message'=>'commercial supprime avec success',
            'commercial'=>$commercial
        ],204);
    }
}
