@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-center">
            {{ __('Whoops! Something went wrong.') }}
        

        <ul style="list-style: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
