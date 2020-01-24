<!DOCTYPE html>

<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> </title>

    <script src="{{ asset('js/app.js') }}"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
      <div id="app">
           @include('inc.navbar')
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">

           @include('menu')

                  </ul>
              </div>
          </nav>

           <div class="container">
                @include('inc.messages')
                 @yield('content')
               <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
               <script>
                   CKEDITOR.replace( 'article-ckeditor' );
               </script>
           </div>
      </div>


</body>

</html>