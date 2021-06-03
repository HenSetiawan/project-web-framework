<?php

use App\Http\Controllers\Admins\AuthAdminController;
use App\Http\Controllers\Bloods\BloodManageController;
use App\Http\Controllers\Users\AuthUsersController;
use App\Http\Controllers\Users\UsersManageController;
use App\Http\Controllers\Volunteer\AuthVolunteerController;
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
    Route::delete('/v1/volunteer/{id}', [VolunteerManageController::class, 'destroy']);
    Route::post('/v1/admin', [AuthAdminController::class,'createNewAdmin']);
    Route::get('/v1/volunteer/{id}', [VolunteerManageController::class,'getVolunteerById']);
    Route::post('/v1/bloods/', [BloodManageController::class,'create']);
});

// auth for user
Route::middleware(['auth:user'])->group(function() {
    Route::post('/v1/auth/user/logout', [AuthUsersController::class, 'logout']);
    Route::post('/v1/auth/user/logoutall', [AuthUsersController::class, 'logoutall']);
    Route::get('/v1/user/', [UsersManageController::class,"getCurrentUser"]);
    Route::put('/v1/users/{id}', [UsersManageController::class, 'update']);
    Route::get('/v1/volunteer/{id}', [VolunteerManageController::class,'getVolunteerById']);
});

// routes public for user
Route::post('/v1/auth/user/login', [AuthUsersController::class, 'login']);
Route::post('/v1/auth/user/register', [AuthUsersController::class, 'register']);

// auth for volunteer
Route::middleware(['auth:volunteer'])->group(function() {
    Route::get('/v1/volunteer/{id}', [VolunteerManageController::class,'getVolunteerById']);
    Route::post('/v1/auth/volunteer/logout', [AuthVolunteerController::class, 'logout']);
});

// routes public for volunteer
Route::post('/v1/auth/volunteer/register', [AuthVolunteerController::class, 'register']);
Route::post('/v1/auth/volunteer/login', [AuthVolunteerController::class, 'login']);
Route::get('/v1/volunteers', [VolunteerManageController::class,'getAllVolunteers']);


Route::get('/v1/bloods/', [BloodManageController::class,'GetAllBloods']);


