<?php

use App\Http\Controllers\Users\AuthUsersController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Auth Users Routes
Route::post('/v1/auth/user/login', [AuthUsersController::class, 'login']);
Route::post('/v1/auth/user/register', [AuthUsersController::class, 'register']);

