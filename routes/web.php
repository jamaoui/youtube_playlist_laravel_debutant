<?php

use App\Http\Controllers\homeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

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
/*
GET    : Lecture
POST   : Ajouter
PUT    : Modification complète
PATCH  : Modification partielle
DELETE : Supprimer


Utilisateur = > nom : jamaoui , prenom : mouad


*/
Route::get('/', [homeController::class,'index']);
