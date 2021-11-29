@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <ul>
    <li>user id: {{$post->user_id}}</li>
    <li>category id: {{$post->category_id}}</li>
    <li>body: {{$post->body}}</li>

</ul>
    
@endsection