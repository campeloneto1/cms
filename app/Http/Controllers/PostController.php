<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->tag){
            return Post::whereJsonContains('tags', $request->input('tag'))->orderBy('id')->get();
        }else{
            return Post::orderBy('id')->get();
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Post();

        $data->title = $request->input('title');
        $data->author = $request->input('author');
        $data->content = $request->input('content');
        $data->tags = $request->input('tags'); 

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
        if($request->input('title')){
            $post->title = $request->input('title');
        }

        if($request->input('author')){
            $post->author = $request->input('author');
        }

        if($request->input('content')){
            $post->content = $request->input('content');
        }

        if($request->input('tags')){
            $post->tags = $request->input('tags');
        }

        $post->save();

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
            return response('', 204);
        }
    }
}
