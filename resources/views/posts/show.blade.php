<x-layouts.app>

    <x-slot name="title">
        {{ $post->title }}
    </x-slot>

    <x-slot name="slot">

        <div class="container my-3"> 
            <a class="btn btn-outline-secondary" href="{{ route('posts.index') }}">Go Back</a> 
            <br>

            <strong>Category:</strong> {{ $post->category->name }}
            <hr>
            
            <strong>Tags: </strong>
            <ul>
            @foreach($post->tags()->get() as $tag)
             <li>  <a href="{{route('tags.show', ['tag' => $tag] )}}">  {{$tag->name}} </a></li>
            @endforeach
            </ul>
            
            <div class="text-center">
            <img src="{{ Storage::url($post->image) }}" class="img-thumbnail center" height="auto" width="30%" alt="" />
            </div>

            <p class="fs-2"><strong> {{$post->body}} </strong></p>

            <p>
                <strong>Comments: </strong>
            <ol>
                @foreach ($post->comments as $comment)
                    <figure>
                        <blockquote class="blockquote">
                            <p>
                                <li> {{ $comment->text }}</li>
                            </p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Posted by: <cite title="Source Title">{{ $comment->user->name }}</cite>
                        </figcaption>
                    </figure>

                    </p>

                    @if ((auth()->user()->hasRole('admin')) || (!(auth()->user()->hasRole('admin'))&& Auth::id() == $comment->user_id)) 
                        <form method="PATCH" action="{{ route('comments.edit', ['comment' => $comment]) }}">
                            @csrf
                            @method('Patch')
                            <button type="submit" class="btn btn-outline-info btn-sm">Edit Comment</button>
                        </form>
                        <form method='POST' action="{{ route('comments.destroy', ['comment' => $comment]) }}">
                            @csrf

                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete comment</button>

                        </form>
                        

                    @else
                    @endif
                @endforeach
            </ol>

            <div class="d-grid gap-2">
                <div class="form-group mb-4">
                    <form method='POST' action="{{ route('comments.store') }}">
                        @csrf

                        <strong>
                            <p>Add comment: </p>
                        </strong>
                        <textarea type="text" name="text" value="{{ old('text') }}" class="form-control"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <button type="submit" class="btn btn-outline-success btn-sm" value="Submit">Submit
                            comment</button>

                    </form>
                </div>
                
                @if ((auth()->user()->hasRole('admin')) || (!(auth()->user()->hasRole('admin'))&& Auth::id() == $post->user_id))
                <form method="PATCH" action="{{ route('posts.edit', ['post' => $post]) }}">
                    @csrf
                    @method('Patch')
                    <button type="submit" class="btn btn-info">Edit Post</button>
                </form>
                <form method='POST' action="{{ route('posts.destroy', ['post' => $post]) }}">
                    @csrf

                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>
                @else
                @endif



               

            </div>
            {{-- AJAX
            <div id="root">
                <ul>
                    <li v-for="comment in comments"> @{{ comment . text }}</li>
                </ul>

                <h1>New comment</h1>
                Comment text: <input type="text" id="input" v-model="newCommentName">
                <button @click="createComment">Create</button>
            </div> --}}

    </x-slot>
</x-layouts.app>

{{-- <script>
    var app = new Vue({
        el: "#root",
        data: {
            comments: [],
            newCommentName: '',
        },
        methods: {
            createComment: function() {
                axios.post("{{ route('api.comments.store') }}", {
                        text: this.newCommentName
                    })
                    .then(response => {

                        this.comments.push(response.data);
                        this.newCommentName = '';
                    })
                    .catch(response => {
                        console.log(response);
                    })
            }
        },
        mounted() {
            axios.get("{{ route('api.comments.index') }}")
                .then(response => {
                    this.comments = response.data;
                })
                .catch(response => {
                    concole.log(response);
                })
        }
    });
</script> --}}
