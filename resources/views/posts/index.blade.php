<x-layouts.app>

    <x-slot name="title">
    Posts
    </x-slot>

    <x-slot name="slot">
    <p>The posts of my blog: </p>    

    <ul>
        @foreach ($posts as $post)
            <li><a href="{{route('posts.show', ['id' => $post->id])}}">{{$post->title}}</a></li>
        @endforeach
    </ul>

    <a href="{{route('posts.create')}}">Create Post</a>
    </x-slot>
</x-layouts.app>


