<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBlogs()
    {

        try{
            $blogs = DB::table('blogs as b')
                        ->select('b.id as id', 'b.judul_blog as judul_blog', 'b.thumbnail as thumbnail', 'a.username as username', 'b.created_at as created_at', 'b.content as content')
                        ->leftJoin('admins as a', 'a.id', '=', 'b.id_penulis')
                        ->orderBy('id', 'DESC')
                        ->get();

            $response = [
                    "message" => 'success get all data blogs',
                    "data" => $blogs
            ];

            return response()->json($response, 200);
        }catch(QueryException $err){
            return response()->json(
                ["error" => $err->errorInfo],
            400);
        }

    }

    public function getCurrentBlogs()
    {
        try{
            $blogs = DB::table('blogs as b')
                        ->select('b.id as id', 'b.judul_blog as judul_blog', 'b.thumbnail as thumbnail', 'a.username as username', 'b.created_at as created_at', 'b.content as content')
                        ->leftJoin('admins as a', 'a.id', '=', 'b.id_penulis')
                        ->orderBy('created_at', 'DESC')
                        ->limit(3)
                        ->get();

            $response = [
                    "message" => 'success get current data blogs',
                    "data" => $blogs
            ];

            return response()->json($response, 200);
        }catch(QueryException $err){
            return response()->json(
                ["error" => $err->errorInfo],
            400);
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

        $blog = $request->validate([
            "judul_blog" => ["required"],
            "thumbnail" => ["required", "mimes:png,jpg,jpeg", "max:2048"],
            "content" => ["required"],
        ]);

        try{
            $file = $request->file('thumbnail');
            $fileName = time(). uniqid(). "." .$file->extension();
            $destination = public_path('storage/images');

            $file->move($destination, $fileName);

            $blog["thumbnail"] = asset("storage/images") . "/" . $fileName;
            $blog["id_penulis"] = $request->user()->id;

            Blogs::create($blog);
            return response()->json([
                "message" => "success add data blog",
                "data" => $blog,
            ], 200);
        }catch(QueryException $err){
            return response()->json(
                ["error" => $err->errorInfo],
             400);
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
            $blog = DB::table('blogs as b')
                        ->select('b.id as id', 'b.judul_blog as judul_blog', 'b.thumbnail as thumbnail','b.content as content', 'a.username as username', 'b.created_at as created_at', 'b.updated_at as updated_at')
                        ->leftJoin('admins as a', 'a.id', '=', 'b.id_penulis')
                        ->orderBy('id', 'ASC')
                        ->where('b.id', $id)
                        ->first();

            $response = [
                    "message" => 'success get data detail blog',
                    "data" => $blog
            ];

            return response()->json($response, 200);
        }catch(QueryException $err){
            return response()->json(
                ["error" => $err->errorInfo],
            400);
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
        $result = Blogs::findOrFail($id);

        $blog = $request->validate([
            "judul_blog" => ["required"],
            "content" => ["required"],
        ]);

        try{
            $blog["id_penulis"] = $request->user()->id;

            if($request->file("thumbnail") == ""){
                $result->update($blog);
            }else{
                $oldImage = explode("/", $result->thumbnail);
                $destination = public_path("storage/images");
                if(file_exists($destination . "/" .end($oldImage))){
                    unlink($destination . "/" . end($oldImage));
                }

                $file = $request->file("thumbnail");
                $fileName = time(). uniqid(). "." .$file->extension();
                $file->move($destination, $fileName);

                $blog["thumbnail"] = asset("storage/images") . "/" . $fileName;
                $result->update($blog);
            }

            return response()->json([
                "message" => "success add data blog",
                "data" => $blog,
            ], 200);

        }catch(QueryException $err){
            return response()->json(
                ["error" => $err->errorInfo],
             400);
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
        $result = Blogs::findOrFail($id);

        try{
            $destination = public_path('storage/images');
            $image = explode("/", $result->thumbnail);

            $result->delete();

            if(file_exists($destination . "/" .end($image))){
            unlink($destination."/".end($image));
            }
            return response()->json([
                "message" => "success delete data blog",
            ])->setStatusCode(200);
        }catch(QueryException $err){
            return response()->json([
                "error" => $err->errorInfo
            ])->setStatusCode(400);
        }
    }
}
