<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\TransferController;
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

Route::post('/create', [BankController::class, 'create']);
Route::get('/edit/{id}', [BankController::class, 'edit']);
Route::post('/edit/{id}', [BankController::class, 'update']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/transfer', [TransferController::class, 'create']);
Route::post('/login', [AuthController::class, 'login']);
