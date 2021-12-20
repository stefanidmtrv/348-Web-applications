<x-layouts.app>

    <x-slot name="title">
        {{ $tag->name }}
    </x-slot>



    <x-slot name="slot">
        <a class="btn btn-outline-secondary" href="{{ route('posts.index') }}">Go Back</a>
        <strong><p>Posts: </p></strong>
        <ul>

            @foreach ($tag->posts()->get() as $post)


             <li><a href="{{route('posts.show', ['post' => $post] )}}"> {{ $post->title }} </a></li>
            @endforeach
        </ul>
    </x-slot>

</x-layouts.app>
