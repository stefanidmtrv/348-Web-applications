<x-layouts.app>


    <x-slot name="title">
    </x-slot>

    <x-slot name="slot">
    <ul>
    <li>user id: {{$post->user_id}}</li>
    <li>category id: {{$post->category_id}}</li>
    <li>body: {{$post->body}}</li>

</ul>
</x-slot name="slot">
</x-layouts.app>
