<?php

use App\Services\Calcul;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('profiles',ProfileController::class);
Route::get('/verify_email/{hash}',[ProfileController::class,'verifyEmail']);
Route::resource('publications',PublicationController::class);

Route::get('/', [homeController::class,'index'])->name('homepage');

Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class,'show'])->name('login.show');
    Route::post('/login', [LoginController::class,'login'])->name('login');
    
});
Route::get('/logout', [LoginController::class,'logout'])->name('login.logout')->middleware('auth');

Route::get('/salam',function(){
    return response()->download('storage/profile/profile.png','',[],'inline');
});

Route::get('/cookie/get',function(Request $request){
    return ($request->cookie('age'));
});
Route::get('/cookie/set/{cookie}',function($cookie){
    $response = new Response();
    $cookieObject = cookie()->forever('age',$cookie);
    return $response->withCookie($cookieObject);
});
Route::get('/headers',function(Request $request){
    $response = new Response(['data'=>'ok']);
    return $response->withHeaders([
        'Content-Type' => 'Application/json',
        'X-Mouad'=> "Yes"
    ]);
});
Route::get('/request',function(Request $request){
  //dd($request->url(),$request->fullUrl());
  //dd($request->path());
  //dd($request->is('request'));
  //dd($request->host());
  dd($request->ip());
});
// Header + Request
    // Content-Type : text/plain image/png application/json
    // Cache
    // ...
    // X-PROFILE = 15
// 404,200,
// Server -> navigateur
