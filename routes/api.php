<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoanController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients',[ClientController::class, 'index']);
Route::get('/clients/{client}',[ClientController::class,'show']);
Route::post('/clients',[ClientController::class, 'store']);
Route::put('/clients/{client}', [ClientController::class, 'update']);
Route::delete('/clients/{client}',[ClientController::class, 'destroy']);

Route::get('/loans',[LoanController::class, 'index']);
Route::get('/loans/{loan}',[LoanController::class,'show']);
Route::post('/loans',[LoanController::class, 'store']);
Route::put('/loans/{loan}', [LoanController::class, 'update']);
Route::delete('/loans/{loan}',[LoanController::class, 'destroy']);
