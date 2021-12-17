<x-layouts.app>

    <x-slot name="title">
        {{ $post->title }}
    </x-slot>

    <x-slot name="slot">

        <div class="container my-3">
            <strong>Category:</strong> {{ $post->category->name }}

            <p> {{ $post->body }}</p>



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



                    <form method='POST' action="{{ route('comments.destroy', ['comment' => $comment]) }}">
                        @csrf

                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete comment</button>

                    </form>




                @endforeach
            </ol>
            <div>
                <form method='POST' action="{{ route('comments.store') }}">
                    @csrf

                    <p>Add comment: <input type="text" name="text" value="{{ old('text') }}"></p>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    <input type="submit" value="Submit">

                </form>

                @role('admin')
                    <form method='POST' action="{{ route('posts.destroy', ['post' => $post]) }}">
                        @csrf

                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete post</button>
                    </form>
                @else

                @endrole

                <p><a href="{{ route('posts.index') }}">Go Back</a></p>

            </div>
            AJAX
            <div id="root">
                <ul>
                    <li v-for="comment in comments"> @{{ comment . text }}</li>
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
</script>
