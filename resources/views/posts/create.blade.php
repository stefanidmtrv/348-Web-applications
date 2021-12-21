<x-layouts.app>


    <x-slot name="title">
        Create post
    </x-slot>

    <x-slot name="slot">
        <div class="card">

            <div class="card-body">
                <form method='POST' action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group mb-4">
                        <p>Title: </p>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control"></p>
                    </div>
                    <p>Category: </p>
                    <select class="form-select mb-4" aria-label="Default select example" name="category_id">
                        <option>Select...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                        @endforeach
                    </select>

                    <div class="form-group mb-4">
                        <strong> <p> Image:</p> </strong>
                        <input type="file" name="image" class="form-control" placeholder="Image">
                    </div>
                    <div class="form-group mb-4">
                        <p>Extract: </p>
                        <textarea type="text" name="extract" value="{{ old('extract') }}"
                            class="form-control"></textarea>
                    </div>



                    <div class="form-group mb-4">
                        <p>Body: </p>
                        <textarea type="text" name="body" value="{{ old('body') }}" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success" value="Submit">Submit</button>

                        <a href="{{ route('posts.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </x-slot>
</x-layouts.app>
