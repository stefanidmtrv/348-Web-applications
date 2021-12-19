<x-layouts.app>


    <x-slot name="title">
        Edit comment
    </x-slot>

    <x-slot name="slot">
        <div class="card">
            
            <div class="card-body">
                <form method='POST' action="{{ route('comments.update', [$comment]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <p>Text: </p>
                        <input type="text" name="text" value="{{ $comment->text }}" class="form-control"></p>
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
