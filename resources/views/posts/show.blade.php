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

<p>Create comment: </p>

<form method='POST' action="{{route('comments.store')}}">
    @csrf
    
    
    <p>Content: <input type="text" name="text"
        value= "{{old('text')}}"></p>
<input type="hidden" name="post_id" value="{{ $post->id }}" />
    <input type="submit" value="Submit">
    <a href="{{route('posts.index')}}">Cancel</a>
</form>

</x-slot>
</x-layouts.app>
