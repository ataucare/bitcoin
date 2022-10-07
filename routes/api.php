<?php

use App\Http\Controllers\Api\BitcoinController;
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

Route::prefix('bitcoin')->group(function () {
    Route::controller(BitcoinController::class)->group(function () {
        Route::get('/getvalor', 'getValor')->name('bitcoin.getValor');
        Route::get('/listarhistorial', 'getHistorial')->name('bitcoin.listar');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
