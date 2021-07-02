<?php

namespace App\Http\Controllers\Bloods;

use App\Http\Controllers\Controller;
use App\Models\Bloods;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BloodManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetAllBloods()
    {
        try{
            $bloods = Bloods::all();

            return response()->json([
                'message' => 'success',
                'data' => $bloods
            ])->setStatusCode(200);

        }catch (QueryException $err) {
            return response()->json([
                'error' => $err->errorInfo
            ])->setStatusCode(400);
        }
    }

    public function getBloodById($id)
    {
        try{
            $blood = Bloods::find($id);

            return response()->json([
                'message' => 'success',
                'data' => $blood
            ])->setStatusCode(200);

        }catch (QueryException $err) {
            return response()->json([
                'error' => $err->errorInfo
            ])->setStatusCode(400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $blood = $request->validate([
            'kategori' => ['required', 'max:25'],
            'jumlah_gol_A' => ['required', 'max:5'],
            'jumlah_gol_B' => ['required', 'max:5'],
            'jumlah_gol_AB' => ['required', 'max:5'],
            'jumlah_gol_O' => ['required', 'max:5'],
        ]);

        try {
            Bloods::create($blood);
            return response()->json([
                "message" => "create data success",
                "data" => $blood
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "create data failed",
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
    public function updateStok(Request $request,$id)
    {

        $result = Bloods::find($id);

       $blood = $request->validate([
            'jumlah_gol_A' => ['required', 'max:5'],
            'jumlah_gol_B' => ['required', 'max:5'],
            'jumlah_gol_AB' => ['required', 'max:5'],
            'jumlah_gol_O' => ['required', 'max:5'],
        ]);

        try {
            $result->update($blood);
            return response()->json([
                "message" => "update data success",
                "data" => $result
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "update data failed",
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
        try {
            $blood = Bloods::findOrFail($id);
            $blood->delete();

            return response()->json(
                ['message' => 'Success']
            )->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json(
                ['error' => $err->errorInfo]
            )->setStatusCode(400);
        }
    }

    public function resetStokById($kategori)
    {
        $result = Bloods::where('kategori',$kategori);
        $blood=[
            'jumlah_gol_A' => 0,
            'jumlah_gol_B' => 0,
            'jumlah_gol_AB' =>0,
            'jumlah_gol_O' => 0,
        ];
        try {
            $result->update($blood);
            return response()->json([
                "message" => "update data success",
                "data" => $result
            ])->setStatusCode(200);

        } catch (QueryException $err) {
            return response()->json([
                "message" => "update data failed",
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }
}
