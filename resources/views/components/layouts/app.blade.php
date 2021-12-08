<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content= "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Blog</title>
    </head>
<body>
    
    <x-navbar>

    </x-navbar>
    <div class='container my-3'>
        @if (session('message'))
        <p><b>{{session('message')}}</b></p>
        @endif

        @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
       
            <header class="bg-white shadow">
               <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                   <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                       {{ $title }}
                   </h2>
                   
               </div>
           </header>
       
               {{ $slot }}
       
           </div>
           <script src="{{ asset('js/app.js') }}" ></script>

</body>
</html>