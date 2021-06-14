<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $agenda = DB::table('agenda')
                    ->select('id', 'judul_agenda', 'deskripsi', 'updated_at')
                    ->get();

            return response()->json([
                "message" => "success get all data agenda",
                "data" => $agenda
            ])->setStatusCode(200);

        }catch(QueryException $err){
            return response()->json([
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenda = $request->validate([
            "judul_agenda" => ["required", "max:150"],
            "deskripsi" => ["required", "max:255"],
            "lokasi" => ["required", "max:150"],
            "waktu" => ["required"],
        ]);

        try {
            Agenda::create($agenda);
            return response()->json([
                "message" => "success add detail agenda",
                "data" => $agenda,
            ])->setStatusCode(200);
        } catch (QueryException $err) {
            return response()->json([
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
            $agenda = DB::table('agenda')
                    ->orderBy('id', 'ASC')
                    ->where('id', $id)
                    ->first();

            return response()->json([
                "message" => "success get all data agenda",
                "data" => $agenda
            ])->setStatusCode(200);

        }catch(QueryException $err){
            return response()->json([
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
        $result = Agenda::findOrFail($id);

        $agenda = $request->validate([
            "judul_agenda" => ["required", "max:150"],
            "deskripsi" => ["required", "max:255"],
            "lokasi" => ["required", "max:150"],
            "waktu" => ["required"],
        ]);

        try {
            $result->update($agenda);
            return response()->json([
                "message" => "success update detail agenda",
                "data" => $agenda,
            ])->setStatusCode(200);
        } catch (QueryException $err) {
            return response()->json([
                "error" => $err->errorInfo
            ])->setStatusCode(400);
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
        $result = Agenda::findOrFail($id);

        try{
            $result->delete();
            return response()->json([
                "message" => "success delete data agenda",
            ])->setStatusCode(200);
        }catch(QueryException $err){
            return response()->json([
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }
}
