<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VolunteerManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $volunteer = DB::table('volunteers')
                            ->select("id", "username", "alamat", "gol_darah", "tanggal_lahir")
                            ->orderBy( "created_at", "ASC")
                            ->get();

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
    public function show($id)
    {
        try{
            $volunteer = DB::table('volunteers')
                        ->where("id", $id)
                        ->select("id", "username", "email", "no_hp", "alamat", "gol_darah", "tanggal_lahir")
                        ->first();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
