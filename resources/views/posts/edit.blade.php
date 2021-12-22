<x-layouts.app>


    <x-slot name="title">
        Edit post
    </x-slot>

    <x-slot name="slot">
        <div class="card">
            
            <div class="card-body">
                <form method='POST' action="{{ route('posts.update', [$post]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <p>Title: </p>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control"></p>
                    </div>
                    <p>Category: </p>
                    <select class="form-select mb-4" aria-label="Default select example"  name="category_id">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                        @endforeach
                    </select>

                   Image:
                 <input type="file" name="image" class="form-control" placeholder="Post Title">
              <img src="{{ Storage::url($post->image) }}" height="200" width="200" alt="" />

                    <div class="form-group mb-4">
                        <p>Extract: </p>
                        <input type="text" name="extract" value="{{ $post->extract}}"
                            class="form-control">
                    </div>

                    

                    <div class="form-group mb-4">
                        <p>Body: </p>
                        <input type="text" name="body" value="{{ $post->body }}" class="form-control">
                    </div>
                    
                    <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success" value="Update">Submit</button>
          
                    <a href="{{ route('posts.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </x-slot>
</x-layouts.app>
