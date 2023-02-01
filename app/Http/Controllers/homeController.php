<?php

namespace App\Http\Controllers;

use App\Mail\profileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    public function index(Request $request) {
        $compteur = $request->session()->increment('compteur',1);
        return view('home',compact('compteur'));
    }
}
