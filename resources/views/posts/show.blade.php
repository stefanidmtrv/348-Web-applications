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

    <form method='POST' action="{{route('comments.destroy', ['comment' => $comment])}}">
        @csrf
        
        @method('DELETE')
        <button type="submit">Delete comment</button>
    </form>
    
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


<form method='POST' action="{{route('posts.destroy', ['post' => $post])}}">
    @csrf
    
    @method('DELETE')
    <button type="submit">Delete post</button>
</form>

<p><a href="{{route('posts.index')}}">Go Back</a></p>

</x-slot>
</x-layouts.app>
