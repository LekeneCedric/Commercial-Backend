<?php

namespace App\Http\Controllers;

use App\Models\utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index(){
        $users = utilisateur::paginate(15);
        return response()->json($users,200);
    }
}
