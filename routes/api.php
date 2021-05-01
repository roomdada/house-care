<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\DomaineController;
use App\Http\Controllers\API\HouseController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



	
	//Category des prestation index-show
	Route::apiResource('domaine',DomaineController::class);
	//resouce service index-show uniquement
	Route::apiResource('service',ServiceController::class);
	//resouce maisons index-show uniquement
	Route::apiResource('house',HouseController::class);
	Route::apiResource('user',UserController::class);
	//creation d'un prestataire de servce
	Route::post('create-provider', [UserController::class, 'storeProvider']);
	//creation d'un chasseur immobilier
	Route::post('create-canvasser', [UserController::class, 'storeCanvasser']);
	//creation d'un client
	Route::post('create-customer', [UserController::class, 'storeCustomer']);
	//paramettre token de la maison et on on retourne le proprietatire de la maison ses info
	Route::get('house-with-user/{house}',[HouseController::class,'getHouseUser']);
	//Contacter un chasseur immobilier
	Route::post('checkout-for-house',[HouseController::class, 'postGetHouse']);
	//Contacter un prestataire de service
	Route::post('checkout-for-service',[ServiceController::class, 'postGetService']);

//connexion a l'api
Route::post("login",[AuthApiController::class,'index']);
