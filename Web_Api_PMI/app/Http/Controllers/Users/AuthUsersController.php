<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthUsersController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Password Invalid'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'message' => 'Password Valid',
            'user' => $user,
            'token' => $token
        ], Response::HTTP_OK);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'max:12'],
            'email' => ['required', 'email'],
            'no_hp' => ['required', 'numeric'],
            'password' => ['required', 'max:24'],
            'confirm_password' => ['required', 'same:password']
        ]);

        if($validator->fails()){
            return response()->json(
                ['error' => $validator->errors()],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $user = $request->all();
        $user['password'] = bcrypt($user['password']);
        $result = User::create($user);

        return response()->json([
            'data' => $result,
            'message' => 'User registration is successful'
        ], Response::HTTP_OK);
    }
}
