<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArbcaseController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\ClaimentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::get('arbcase', [ArbcaseController::class, 'arbcase']);

    Route::get('arbcase1/{id}', [ArbcaseController::class, 'arbcaseid']);

    Route::get('arbcase/userid', [ArbcaseController::class, 'arbcaseuser']);

    Route::get('arbcase/arbid', [ArbcaseController::class, 'arbid']);

    Route::post('arbcase/status', [StatesController::class, 'status']);

    Route::post('arbcase/status/update', [StatesController::class, 'updatedata']);

    Route::post('arbcase/ongoingdata', [ArbcaseController::class, 'ongoingdata']);

    Route::post('arbcase/closed', [ArbcaseController::class, 'closed']);

    Route::post('arbcase/newrequest', [ArbcaseController::class, 'NewRequest']);

    Route::post('arbcase/reject', [ArbcaseController::class, 'Reject']);

    Route::get('arbcase/climeatdata/{id}', [ClaimentController::class, 'climeat']);

    Route::get('arbcase/relationdata/{id}', [ClaimentController::class, 'relationdata']);



});

Route::middleware(['auth', 'ArbitAuth'])->group(function () {


    Route::post('arbcase/arbituser', [StatesController::class, 'arbituser']);



});
