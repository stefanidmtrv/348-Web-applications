<x-layouts.app>

    <x-slot name="title">
    Posts
    </x-slot>

    <x-slot name="slot">
   
      
    <div><a class="btn btn-outline-primary" href="{{route('posts.create')}}">Create Post</a>

    <p><a href="{{route('home')}}">Go Back</a></p>
</div>
        <ul>
        @foreach ($posts as $post)
        <div class='container my-3'>
                <article class="post vt-post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
                            <div class="post-type post-img">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid" alt="image post">
                            </div>
                            <div class="author-info author-info-2">
                                <ul class="list-inline">
                                    <li>
                                        <div class="info">
                                            <p>Posted by: <strong>{{$post->user->name}}</strong></p>
                                            </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <p>Posted on: {{$post->created_at}}</p>
                                            </div>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                            <div class="caption">
                                <h3 class="display-5">{{$post->title}}</h3>
                                <p> {{$post->extract}} </p>
                                <a class="btn btn-primary" href="{{route('posts.show', ['post' => $post])}}" role="button">Read More</a> </div>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </ul>
    
    <div>{{ $posts->links() }}</div>
    
    </x-slot>
</x-layouts.app>


