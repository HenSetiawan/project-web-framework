<?php

use App\Http\Controllers\Admins\AdminsManageController;
use App\Http\Controllers\Admins\AuthAdminController;
use App\Http\Controllers\Agenda\AgendaManageController;
use App\Http\Controllers\Blogs\BlogsManageController;
use App\Http\Controllers\Bloods\BloodManageController;
use App\Http\Controllers\Users\AuthUsersController;
use App\Http\Controllers\Users\UsersManageController;
use App\Http\Controllers\Volunteer\AuthVolunteerController;
use App\Http\Controllers\Volunteer\VolunteerManageController;
use App\Http\Controllers\FAQ\FAQManageController;
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
    Route::get('/v1/auth/admin/logout', [AuthAdminController::class,'logout']);
    Route::get('/v1/auth/admin/logoutall', [AuthAdminController::class,'logoutAll']);


    Route::put('/v1/blood/{kategori}', [BloodManageController::class,'resetStokById']);
    Route::post('/v1/blood/{id}', [BloodManageController::class,'updateStok']);


    Route::get('/v1/admin/', [AdminsManageController::class,'getCurrentAdmin']);
    Route::get('/v1/admin/{id}', [AdminsManageController::class, 'getAdminById']);
    Route::get('/v1/admins/', [AdminsManageController::class,'getAllAdmins']);
    Route::delete('/v1/admin/{id}', [AdminsManageController::class,'deleteById']);
    Route::put('/v1/admin/{id}', [AdminsManageController::class,'updateAdmin']);

    Route::post('/v1/blog', [BlogsManageController::class, 'store']);
    Route::post('/v1/blog/{id}', [BlogsManageController::class, 'update']);
    Route::delete('/v1/blog/{id}', [BlogsManageController::class, 'destroy']);

    Route::post('/v1/event', [AgendaManageController::class, 'store']);
    Route::put('/v1/event/{id}', [AgendaManageController::class, 'update']);
    Route::delete('/v1/event/{id}', [AgendaManageController::class, 'destroy']);

    Route::post('/v1/ask' , [FAQManageController::class, 'store']);
    Route::put('v1/ask/{id}', [FAQManageController::class,'update']);
    Route::delete('/v1/ask/{id}', [FAQManageController::class,'destroy']);
    Route::get('/v1/ask/{id}', [FAQManageController::class,'show']);
});

// auth for user
Route::middleware(['auth:user'])->group(function() {
    Route::get('/v1/auth/user/logout', [AuthUsersController::class, 'logout']);
    Route::get('/v1/auth/user/logoutall', [AuthUsersController::class, 'logoutall']);
    Route::get('/v1/user/', [UsersManageController::class,"getCurrentUser"]);
    Route::put('/v1/user/{id}', [UsersManageController::class, 'update']);
});


// auth for volunteer
Route::middleware(['auth:volunteer'])->group(function() {
    Route::get('/v1/auth/volunteer/logout', [AuthVolunteerController::class, 'logout']);
    Route::put('/v1/volunteer/{id}', [VolunteerManageController::class, 'update']);
});

// routes public for volunteer
Route::post('/v1/auth/volunteer/register', [AuthVolunteerController::class, 'register']);
Route::post('/v1/auth/volunteer/login', [AuthVolunteerController::class, 'login']);
Route::get('/v1/volunteers', [VolunteerManageController::class,'getAllVolunteers']);


// routes puclic admin
Route::post('/v1/auth/admin/login', [AuthAdminController::class, 'login']);
Route::get('/v1/bloods/', [BloodManageController::class,'GetAllBloods']);
Route::get('/v1/blood/{id}', [BloodManageController::class,'GetBloodById']);
Route::get('/v1/blogs', [BlogsManageController::class, 'getAllBlogs']);
Route::get('/v1/events', [AgendaManageController::class, 'index']);
Route::get('/v1/asks' , [FAQManageController::class, 'index']);
Route::get('/v1/blogs/current', [BlogsManageController::class, 'getCurrentBlogs']);
Route::get('/v1/blog/{id}', [BlogsManageController::class, 'show']);

// routes public for user
Route::post('/v1/auth/user/login', [AuthUsersController::class, 'login']);
Route::post('/v1/auth/user/register', [AuthUsersController::class, 'register']);


// multi role
Route::middleware(['auth:sanctum','isMultiRole'])->group(function() {
    Route::get('/v1/volunteer/{id}', [VolunteerManageController::class,'getVolunteerById']);
    Route::get('/v1/event/{id}', [AgendaManageController::class, 'show']);
});
