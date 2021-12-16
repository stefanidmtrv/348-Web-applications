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

AJAX
<div id="root">
    <ul>
        <li v-for="comment in comments"> @{{comment.text}}</li>
    </ul>

    <h1>New comment</h1>
    Comment text: <input type="text" id="input" v-model="newCommentName">
    <button @click="createComment">Create</button>
</div>



</x-slot>
</x-layouts.app>

<script>
    var app = new Vue({
        el: "#root",
        data: {
            comments: [],
            newCommentName: '',
        },
        methods: {
        createComment: function(){
        axios.post("{{route('api.comments.store')}}",
        {
            text: this.newCommentName
        })
        .then(response=>{
            
        this.comments.push(response.data);
            this.newCommentName='';
        })
        .catch(response=>{
            console.log(response);
        })
    }
        },
        mounted(){
            axios.get("{{route ('api.comments.index')}}")
            .then(response => {
                this.comments = response.data;
            })
            .catch(response => {
                concole.log(response);
            })
        }
    });
</script>
