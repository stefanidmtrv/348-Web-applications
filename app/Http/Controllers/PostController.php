<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Services\Instagram;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Validation\Rule;

Paginator::useBootstrap();

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
        $posts = Post::latest()->paginate(7);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('posts.create', ['categories'=>$categories]);
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id' => 'required|integer',
            'extract' => 'required|max:500',
            'title' => 'required|max:255',
            'body' => 'required|max:1000',
        ]);

        $path = $request->file('image')->store('public/images');
        $p1 = new Post;
        $p1->user_id = Auth::id();
        $p1->image = $path;
        $p1->category_id = $validatedData['category_id'] ;
        $p1->extract= $validatedData['extract'] ;
        $p1->title = $validatedData['title'];
        $p1->body = $validatedData['body'];
        $p1->save();

        $filename = $request->image;
        $request->image->storeAs('images',$filename,'public');


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
        
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $post->update([
            'category_id' => $request->category_id,
            'extract' => $request->extract,
            'title' => $request->title,
            'body' => $request->body
        ]);
        
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }
        $post->save();

        return redirect()->route('posts.show', ['post' => $post])->with('message', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post was deleted.');
    }
}
