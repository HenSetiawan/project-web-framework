<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

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
}
