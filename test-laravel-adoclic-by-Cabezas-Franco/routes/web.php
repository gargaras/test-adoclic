<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    view('Welcome');
});
Route::get('/api/{category}', [ApiController::class, 'fetchEntitiesByCategory']);
Route::get('/api', function () {
    $response = Http::get('https://api.publicapis.org/entries');
    $data = $response->json();
    dd($data);
});
