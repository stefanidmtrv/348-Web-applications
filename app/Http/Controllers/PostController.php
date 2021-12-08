<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\Instagram;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function example(Post $foo, Instagram $t){
         //dependency injection
        dd($t);

     }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request['title']);

        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'title' => 'required|max:255',
            'body' => 'required|max:255',
        ]);

        $p1 = new Post;
        $p1->user_id = $validatedData['user_id'];
        $p1->category_id = $validatedData['category_id'] ;
        $p1->title = $validatedData['title'];
        $p1->body = $validatedData['body'];
        $p1->save();

        session()->flash('message', 'Post was created.');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);
        //dd($post);
        //dump($post);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
