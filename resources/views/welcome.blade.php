<x-layouts.app>
    
    <x-slot name="title">
        
        Homepage
    </x-slot>

    <x-slot name="slot">
        
      @auth
      <div><p class="fs-1">Hello again! Discover all of the
           <a href="{{route('posts.index')}}"> posts</a></p>
        </div>
          
      @endauth

        @guest
        <div><p class="fs-1">Hello again!
           Register or log in to discover posts.
           </p>
           
           <a class="btn btn-primary btn-lg" href="{{route('register')}}" role="button">
            Register
           </a>

           <a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">
            Log In
           </a>
            

        </div>
        @endguest
          
        

    </x-slot>

    
    
</x-layouts.app>
    
