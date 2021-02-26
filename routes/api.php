<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InfoController;
use App\Http\Controllers\API\Portfolio;

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

Route::get('/index', [InfoController::class,'index']);
Route::post('/update/{id}', [InfoController::class,'update']);

Route::get('/portfolio/index', [Portfolio::class,'index']);
Route::post('/portfolio/store', [Portfolio::class,'store']);
Route::post('/portfolio/del/{id}', [Portfolio::class,'destroy']);
Route::post('/portfolio/update/{id}', [Portfolio::class,'update']);
