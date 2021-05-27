<?php

use App\Http\Controllers\Users\AuthUsersController;
use App\Http\Controllers\Users\UsersManageController;
use App\Http\Controllers\Volunteer\VolunteerManageController;
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


// auth for admin
Route::middleware(['auth:admin'])->group(function() {
    Route::resource('/v1/users', UsersManageController::class)->except('update');
});

// auth for user
Route::middleware(['auth:user'])->group(function() {
    Route::post('/v1/auth/user/logout', [AuthUsersController::class, 'logout']);
    Route::post('/v1/auth/user/logoutall', [AuthUsersController::class, 'logoutall']);
    Route::get('/v1/user/', [UsersManageController::class,"getCurrentUser"]);
    Route::put('/v1/users/{id}', [UsersManageController::class, 'update']);
});

// auth for volunteer
Route::middleware(['auth:volunteer'])->group(function() {
    // type your routes
});

Route::post('/v1/auth/user/login', [AuthUsersController::class, 'login']);
Route::post('/v1/auth/user/register', [AuthUsersController::class, 'register']);
