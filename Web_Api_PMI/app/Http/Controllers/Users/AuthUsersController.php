<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class AuthUsersController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $user=User::where('email',$request->email)->first();
            if($user!=null && Hash::check($request->password,$user->password)){
                 $token=$user->createToken($user->email);
                 return response()->json([
                 "message"=>'succcess',
                 "data"=>$user,
                 "token"=>$token->plainTextToken
                ])->setStatusCode(200);
            }else{
             return response()->json([
                 "message"=>'email or password is wrong'
                ])->setStatusCode(400);
            }
         } catch (QueryException $err) {
             return response()->json([
                 "message"=>"auth user failed",
                 "data"=>$user,
                 "error"=>$err->errorInfo
             ])->setStatusCode(400);
         }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'no_hp' => ['required', 'max:15'],
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
