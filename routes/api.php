<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post("/signup", [AuthController::class, "signup"]);

//TODO: RUTAS PROTEGIDAS POR SANCTUM
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::get("/listarAreas",[ClientController::class,"listarAreas"]);
    Route::post("/reservarAreas", [ClientController::class, "reservarAreas"]);
    Route::get("/areasReservadas", [ClientController::class, "listarAreasReservadas"]);

});
