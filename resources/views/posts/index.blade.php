@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <p>The posts of my blog: </p>    

    <ul>
        @foreach ($posts as $post)
            <li>{{$post->title}}
            </li>
        @endforeach
    </ul>


@endsection

