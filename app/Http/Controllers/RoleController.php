<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index(){
        $roles =  role::paginate(15);
        return response()->json($roles,200);
    }
    public function store(Request $request){
        $validators = Validator::make($request->all(),[
            'intitule'=>'required|string',
            'max_produit'=>'required|int',
        ]);
        if($validators->fails()){
            return response()->json($validators->errors(),400);
        }
        $role = role::create($validators->validated());
        return response()->json($role,200);
    }
    public function find($id){
        $role = role::find($id);
        if(is_null($role)){
            return response()->json([
                'message'=>'aucune role correspondante!'
            ]);
        }
        return response()->json($role,200);
    }
    public function update(Request $request, $id){
        $role = role::find($id);
        if(is_null($role)){
            return response()->json(['message'=>'aucune role']);
        }
        $role_update = $role->update($request->all());
        return response()->json($role_update,200);
    }
    public function delete($id){
          $role = role::find($id);
          if(is_null($role)){
            return response()->json(['message'=>'aucune role correspondante']);
          }
          $role = $role->delete();
          return response()->json($role);
    }
}
