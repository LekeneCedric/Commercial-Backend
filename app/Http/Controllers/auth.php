<?php
namespace App\Http\Controllers;

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
            'email'=>'required|string|email|max:100|unique:users',
            'telephone'=>'required|string',
            'date_enregistrement'=>'required|date_format:Y-m-d H:i:s',
            'password'=>'required|string|confirmed' 
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
        $response = [
            'token' => $token,
            'user'  => $user
        ];
        return response()->json($response,201);

    }
    public function login(Request $request){
        
        $validator=Validator::make($request->all(),[
            
            'email'=>'required|string|email|max:100',
            'password'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user = utilisateur::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password , $user->password))
        {
            return response()->json(['message'=>'Invalid account'],401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken; 
        $response = [
            'message'=>'welcome'.$user->name,
            'user' => $user,
            'token' => $token
        ];
        return response()->json($response,201);

    } 

    public function logout(Request $request){
        FacadesAuth::user()->tokens->each(function($token){
            $token->delete();
            return response()->json([
                'message'=>"utilisateur deconnecte avec success"
            ]);
        });
    }
}
