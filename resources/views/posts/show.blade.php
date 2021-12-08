<x-layouts.app>

    <x-slot name="title">
        {{$post->title}}
    </x-slot>

    <x-slot name="slot">
    <ul>
    <li>user id: {{$post->user_id}}</li>
    <li>category id: {{$post->category_id}}</li>
    <li>body: {{$post->body}}</li>

</ul>

<p>Comments: </p>
<ol>
@foreach ($post->comments as $comment)
<li>{{$comment->text}}</li>
    
@endforeach
</ol>
</x-slot name="slot">
</x-layouts.app>
