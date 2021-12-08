<x-layouts.app>

    <x-slot name="title">
        {{$post->title}}
    </x-slot>

    <x-slot name="slot">
    <ul>
    <li>Posted by {{$post->user->name}}</li>
    <li>Category: {{$post->category->name}}</li>
    <li>body: {{$post->body}}</li>

</ul>

<p>Comments: </p>
<ol>
@foreach ($post->comments as $comment)

    <li>{{$comment->user->name}} : {{$comment->text}}</li>
    
    
@endforeach
</ol>
</x-slot>
</x-layouts.app>
