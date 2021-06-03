<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
   public function  createNewAdmin(Request $request)
   {
    $validatedAdmin=$request->validate([
        'username' => ['required', 'max:50'],
        'email' => ['required', 'email', 'max:50'],
        'no_hp' => ['required', 'max:15'],
        'password' => ['required', 'max:24'],
        'confirm_password' => ['required', 'same:password'],
       ]);


       $validatedAdmin['password']=Hash::make($validatedAdmin['password']);
       try {
        Admin::create($validatedAdmin);
        return response()->json([
            "message" => "register admin success",
            "data" => [
                "username" => $validatedAdmin['username'],
                "email" => $validatedAdmin['email'],
            ],
            "error" => null,
        ])->setStatusCode(200);

    } catch (QueryException $err) {
        return response()->json([
            "message" => "register user failed",
            "error" => $err->errorInfo
        ])->setStatusCode(400);
    }
   }



}
