<x-layouts.app>

    <x-slot name="title">
    Posts
    </x-slot>

    <x-slot name="slot">
   

    <ul>
        @foreach ($posts as $post)
            <li><a href="{{route('posts.show', ['post' => $post])}}">{{$post->title}}</a></li>
        @endforeach
    </ul>

    <a href="{{route('posts.create')}}">Create Post</a>

    <p><a href="{{route('home')}}">Go Back</a></p>
    </x-slot>
</x-layouts.app>


