<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request) {
        $nom = "Jamaoui";
        $prenom = "Mouad";
        //$languages = [];
        $languages = ['PHP', 'LARAVEL', 'SYMFONY', 'React.js', 'MYSQL'];
        return view('home',compact('nom','languages','prenom'));
        //compact('nom','languages')
    }
}
