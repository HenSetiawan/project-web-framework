<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Hash;

class VolunteerManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllVolunteers()
    {
        try {
            $volunteer=Volunteer::all("id","username","gol_darah","alamat","tanggal_lahir","created_at","updated_at");
            return response()->json([
                "message" => "success get all data volunteers",
                "data" => $volunteer,
                "error" => null
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed when get all data volunteers",
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getVolunteerById($id)
    {
        try{
            $volunteer=Volunteer::find($id);
            return response()->json([
                "message" => "get data success",
                "data" => $volunteer,
                "error" => null
            ])->setStatusCode(200);

        }catch(QueryException $err){
            return response()->json([
                "message" => "failed to get data volunteers",
                "error" => $err->errorInfo
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
        $result = Volunteer::findOrFail($id);

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
            $result->update($volunteer);

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
    public function destroy($id)
    {
        try {
            $volunteer = Volunteer::findOrFail($id);
            $volunteer->tokens()->delete();
            $volunteer->delete();

            return response()->json([
                "message" => "success delete volunteer"
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed to delete volunteer",
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }
    public function getCurrentVolunteer(Request $request)
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
