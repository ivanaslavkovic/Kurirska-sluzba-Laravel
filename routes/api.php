<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketKontroler;

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

Route::get('paketi', [PaketKontroler::class, 'index']);
Route::get('paketi/{paket}', [PaketKontroler::class, 'show']);
Route::delete('paketi/{paket}', [PaketKontroler::class, 'destroy']);
Route::put('paketi/{paket}', [PaketKontroler::class, 'update']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
