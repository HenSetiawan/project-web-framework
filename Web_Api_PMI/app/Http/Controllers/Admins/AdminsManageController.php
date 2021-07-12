<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsManageController extends Controller
{
    public function getCurrentAdmin(Request $request)
    {
        try{
            $user = $request->user();

            return response()->json([
                'message' => 'success get admin data',
                'data' => $user
            ])->setStatusCode(200);

        }catch (QueryException $err) {
            return response()->json([
                'error' => $err->errorInfo
            ])->setStatusCode(400);
        }
    }

    public function getAllAdmins()
    {
        try {
            $admins=Admin::all();
            return response()->json([
                "message" => "success get all data admins",
                "data" => $admins,
                "error" => null
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed when get all data admins",
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }

    public function getAdminById($id)
    {
        try {
            $admin = DB::table('admins')
                        ->where('id', $id)
                        ->get();
            return response()->json([
                "message" => "success get data admin",
                "data" => $admin,
                "error" => null
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed when get data admins",
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }

     public function updateAdmin(Request $request, $id)
    {
        $result = Admin::findOrFail($id);

        $admin = $request->validate([
            'username' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'no_hp' => ['required', 'max:15'],
            'password' => ['required', 'max:24'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $admin['password'] = Hash::make($admin['password']);

        try {
            $result->update($admin);

            return response()->json([
                'message' => 'success update admin',
                'data' => $result
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json(
                ['error' => $err->errorInfo]
            )->setStatusCode(400);
        }
    }

    public function deleteById($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->tokens()->delete();
            $admin->delete();

            return response()->json([
                "message" => "success delete admin"
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed to delete admin",
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }
}
