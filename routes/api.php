<?php

use App\Http\Controllers\LiskovSubstitution\Problem\UserController;
use App\Http\Controllers\OpenClose\Solution\EventBusController;
use App\Http\Controllers\SingleResponsibility\Solution\ApiController;
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

Route::get('/air-table', [ApiController::class, 'handle']);
Route::post('/event-bus', [EventBusController::class, 'handle']);

Route::get('/user/{userId}', [UserController::class, 'show']);
