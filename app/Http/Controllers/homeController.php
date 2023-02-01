<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request) {
        $users = [
            ['id'=> '1','nom'=> 'jamaoui','metier'=> 'Expert technique'],
            ['id'=> '2','nom'=> 'saidi','metier'=> 'Directeur'],
            ['id'=> '3','nom'=> 'salimi','metier'=> 'Jardinier'],
        ];
       return view('home',compact('users'));
    }
}
