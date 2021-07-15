<?php

namespace App\Http\Controllers\FAQ;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FAQManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $faq = DB::table('frequently_ask_question')
                   ->orderBy('id', 'ASC')
                   ->get();
            $response = [
                'message'=> 'Success',
                'data' => $faq,
            ];
            return response()->json($response, 200);
        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed",
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
        $faq = $request->validate([
            'question' => ["required"],
            'answer' => ["required"],
        ]);

        try {
            FAQ::create($faq);
            return response()->json([
                "message" => "success to add data FAQ",
                "data" => $faq
            ])->setStatusCode(200);
        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed to add data FAQ",
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
            $faq = DB::table('frequently_ask_question')->where('id', $id)->first();
            return response()->json([
                "message" => "success to get data FAQ",
                "data" => $faq
            ])->setStatusCode(200);
        }catch(QueryException $err){
            return response()->json([
                "message" => "failed to get data FAQ",
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
        $result = FAQ::findOrFail($id);

        $faq = $request->validate([
            'question' => ["required"],
            'answer' => ["required"],
        ]);

        try {
            $result->update($faq);
            return response()->json([
                "message" => "success to update data FAQ",
                "data" => $faq
            ])->setStatusCode(200);
        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed to update data FAQ",
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
            $faq = FAQ::findOrFail($id);
            $faq->delete();

            return response()->json([
                "message" => "success to delete data FAQ",
                "data" => $faq
            ])->setStatusCode(200);
        } catch (QueryException $err) {
            return response()->json([
                "message" => "failed to delete data FAQ",
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }
}
