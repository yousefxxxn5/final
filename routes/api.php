<?php

use App\Http\Controllers\controll__api;
use App\Http\Controllers\controll_api;
use App\Http\Controllers\telgram;
use App\Http\Controllers\whatsappControll;
use App\Models\controll_panel;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::post('/decat', [controll__api::class ,'decat']);
Route::any('IR_SENSER/{IP}/{NAME}', [controll__api::class ,'IR_SENSER']);

Route::any('dataSenser',[controll__api::class ,'dataSenser'] );

// Route::any('CAM_SENSER/{IP}/{NAME}',[controll__api::class ,'CAM_SENSER'] );

Route::any('STATE_SETTING/{IP}/{NAME}',[controll__api::class ,'STATE_SETTING'] );

Route::post('/api/webhook', [telgram::class, 'handleWebhook']);
Route::post('/api/whatsapp', [whatsappControll::class, 'handleWebhook']);


