<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::orderBy('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Post();

        $data->title = $request->title;
        $data->author = $request->author;
        $data->content = $request->content;
        $data->tags = $request->tags; 

        $data->save();

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        return Post::whereJsonContains('tags', $post)->orderBy('id')->get();
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Post $post)
    {
         $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        $post->tags = $request->tags; 

       $post->save();

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
            return response()->json($post, 204);
        }
    }
}
