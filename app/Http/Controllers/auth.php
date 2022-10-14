<?php
namespace App\Http\Controllers;

use App\Models\commerciaux;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class auth extends Controller
{
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|string|email|max:100|unique:utilisateurs',
            'telephone'=>'required|string|unique:utilisateurs',
            'password'=>'required|string|confirmed',
            'idrole' => 'required|int',
            'idagence'=>'required|int'
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 400);
        }
        $user = utilisateur::create(
            array_merge($validator->validated(),
            [
                'password'=>bcrypt($request->password)
            ]
            ));
        $token = $user->createToken('tokenFamily')->plainTextToken; 
        $user->token = $token;
        return response()->json($user,201);

    }
    public function login(Request $request){
        
        $validator=Validator::make($request->all(),[
            
            'email'=>'required|string|email|max:100',
            'telephone'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $commercial = commerciaux::where('email',$request->email)->where('telephone',$request->telephone)->first();
        if(!$commercial)
        {
            return response()->json(['message'=>'Invalid account'],401);
        }
        return response()->json($commercial);
    } 
}

