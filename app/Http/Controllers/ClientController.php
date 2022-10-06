<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(){
        $clients = client::paginate(15);
        return response()->json($clients,200);
    }
    public function store(Request $request){
       $validator = Validator::make($request->all(),[
        'nom'=>'required|string',
        'prenom'=>'required|string',
        'email'=>'required|email',
        'telephone'=>'required|string',
        'sexe'=>'required|string',
        'entreprise'=>'required|string',
       ]);
       if($validator->fails()){
        return response()->json($validator->errors(),400);
       }
       $client = client::create(
        $validator->validated()
       );
       return response()->json($client,200);
    }
    public function update(Request $request,$id){
        $client = client::find($id);
        if(is_null($client)){
            return response()->json($client);
        }
        $client_update = $client->update($request->all());
        return response()->json($client_update,201);
    }
   
    public function find($id){
        $client = client::find($id);
        if(is_null($client)){
            return response()->json([
                'message'=>'Aucun client correspondant'
            ]);
        }
        return $client;
    }
    public function delete($id){
        $client= client::find($id);
        if(is_null($client)){
            return response()->json($client);
        }
        $client = client::destroy($id);
        return response()->json([
            'message'=>'client supprime avec success',
            'client'=>$client
        ],204);
    }
    public function facturesClient($id_client){
        $client = client::find($id_client);
        if(is_null($client)){
            return response()->json([
                'message'=>'aucun client correspondant'
            ]);
        }
        $factures = $client->facture;
        foreach($factures as $facture){
             $facture->facturedetail;
        }
        return response()->json($facture,200);
    }
    public function retourClient($id_client){
        $client = client::find($id_client);
        if(is_null($client)){
            return response()->json([
                'message'=>'aucun client correspondant'
            ]);
        }
        $retours = $client->retour;
        return response()->json($retours,200);
    }
}
