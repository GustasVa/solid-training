<?php

use App\Http\Controllers\DependencyInversion\Solution\FileController;
use App\Http\Controllers\InterfaceSegregation\Solution\PriceController;
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

// SRP
Route::get('/air-table', [ApiController::class, 'handle']);

// OpenClose
Route::post('/event-bus', [EventBusController::class, 'handle']);

// Liskov Substitution
Route::get('/user/{userId}', [UserController::class, 'show']);

// Interface Segregation
Route::post('/price/calculate', [PriceController::class, 'calculate']);

// Dependency Inversion
Route::post('/file/read', [FileController::class, 'read']);
Route::post('/file/write', [FileController::class, 'write']);
