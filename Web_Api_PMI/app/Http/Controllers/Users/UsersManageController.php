<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $user = DB::table('users')
                    ->orderBy('created_at', 'ASC')
                    ->select('id', 'username', 'email', 'no_hp')
                    ->get();

            return response()->json([
                'message' => 'success get all users data',
                'data' => $user
            ])->setStatusCode(200);

        }catch (QueryException $err) {
            return response()->json([
                'error' => $err->errorInfo
            ])->setStatusCode(400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user = DB::table('users')
                    ->orderBy('created_at', 'ASC')
                    ->select('id', 'username', 'email', 'no_hp')
                    ->where('id', $id)
                    ->first();

            return response()->json([
                'message' => 'success get users data',
                'data' => $user
            ])->setStatusCode(200);

        }catch (QueryException $err) {
            return response()->json([
                'error' => $err->errorInfo
            ])->setStatusCode(400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = User::findOrFail($id);

        $user = $request->validate([
            'username' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'no_hp' => ['required', 'max:15'],
            'password' => ['required', 'max:24'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $user['password'] = Hash::make($user['password']);

        try {
            $result->update($user);

            return response()->json([
                'message' => 'success update user',
                'data' => $result
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json(
                ['error' => $err->errorInfo]
            )->setStatusCode(400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $request->user()->tokens()->delete();
            $user->delete();

            return response()->json(
                ['message' => 'Success']
            )->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json(
                ['error' => $err->errorInfo]
            )->setStatusCode(400);
        }
    }

    public function getCurrentUSer(Request $request)
    {
        try{
            $user = $request->user();

            return response()->json([
                'message' => 'success get users data',
                'data' => $user
            ])->setStatusCode(200);

        }catch (QueryException $err) {
            return response()->json([
                'error' => $err->errorInfo
            ])->setStatusCode(400);
        }
    }
}
