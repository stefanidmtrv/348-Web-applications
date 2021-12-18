<x-layouts.app>

    <x-slot name="title">

        Homepage
    </x-slot>

    <x-slot name="slot">

      <section class="vh-100 bg-image" style="background-image: url('https://149364069.v2.pressablecdn.com/wp-content/uploads/2016/11/free-blue-background.jpg');">
        @auth
        
            <div>
                <p class="text-center display-5 fst-italic">Hello again! <br> Discover all of the
                    <a href="{{ route('posts.index') }}"> posts</a> !
                </p>
            </div>
        

        @endauth

        @guest
            <div>
              <p class="text-center display-5 fst-italic">Hello again!
                    Register or log in to discover posts.
                </p>
                <div class="col-md-12 text-center">
                <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">
                    Register
                </a>

                <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">
                    Log In
                </a>
                </div>

            </div>
        @endguest


      </section>
    </x-slot>



</x-layouts.app>
