<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function apiIndex(){
        $comments = Comment::all();
        return $comments;
    }

    public function apiStore(Request $request){

        // validation!
    
        $comment = new Comment();
        $comment->text = $request['text'];
        $comment->user_id = Auth::id();
        $comment->post_id = 1;
        $comment->save();

        
        return $comment;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = request()->validate([
            'text' => 'required|max:1000',
            'post_id' => 'required'
        ]);
        
        $comment = new Comment;
        $comment->text = $validatedData['text'];
        $comment->user_id = Auth::id();
        $comment->post_id = $validatedData['post_id'];
        $comment->save();

        session()->flash('message', 'Comment was created.');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $post = $comment->post_id;
        $comment->update([
            'text' => $request->text
        ]);

        return redirect()->route('posts.show', ['post' => $post])->with('message', 'Comment has been updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('message', 'Comment was deleted.');
    }
}
