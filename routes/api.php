<?php

use App\Http\Controllers\AutentifikacijaKontroler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketKontroler;
use App\Http\Controllers\KorisnikKontroler;

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

Route::post('register', [AutentifikacijaKontroler::class, 'register']);
Route::post('login', [AutentifikacijaKontroler::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete('paketi/{paket}', [PaketKontroler::class, 'destroy']);
    Route::put('paketi/{paket}', [PaketKontroler::class, 'update']);
    Route::delete('korisnik/{korisnik}', [KorisnikKontroler::class, 'destroy']);
    Route::post('logout', [AutentifikacijaKontroler::class, 'logout']);
});



Route::get('paketi', [PaketKontroler::class, 'index']);
Route::get('paketi/{paket}', [PaketKontroler::class, 'show']);
Route::get('korisnik', [KorisnikKontroler::class, 'index']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
