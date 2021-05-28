<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Volunteer;
use Illuminate\Database\QueryException;

class AuthVolunteerController extends Controller
{
    public function Register(Request $request)
    {
        $volunteer = $request->validate([
            "username" => ["required", "max:50"],
            "email" => ["required", "max:50"],
            "gol_darah" => ["required", "max:5"],
            "alamat" => ["required"],
            "no_hp" => ["required", "max:15"],
            "tanggal_lahir" => ["required", "max:50"],
            "password" => ["required"],
            "confirm_password" => ["required", "same:password"]
        ]);

        $volunteer["password"] = Hash::make($volunteer["password"]);

        try {
            Volunteer::create($volunteer);

            return response()->json([
                "message" => "register volunteer successful",
                "data" => [
                    "username" => $volunteer["username"],
                    "email" => $volunteer["email"],
                    "no_hp" => $volunteer["no_hp"],
                    "alamat" => $volunteer["alamat"],
                    "gol_darah" => $volunteer["gol_darah"]
                ],
                "error" => null,
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "register volunteer failed",
                "data" => $volunteer,
                "error" => $err->errorInfo,
            ])->setStatusCode(400);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => ["required", "max:50"],
            "password" => ["required"]
        ]);

        try {
            $volunteer = Volunteer::where("email", $request->email)->first();

            if($volunteer != null && Hash::check($request->password, $volunteer->password)){
                $token = $volunteer->createToken($volunteer->email);
                return response()->json([
                "message" => 'succcess',
                "data" => $volunteer,
                "token" => $token->plainTextToken
               ])->setStatusCode(200);

           }else{
            return response()->json([
                "message"=>'email or password is wrong'
               ])->setStatusCode(401);
           }

        } catch (QueryException $err) {
            return response()->json([
                "message" => "auth volunteer failed",
                "data" => $volunteer,
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }
}
