<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','Adam-Blog')}}</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet"
        <!-- Fonts -->

        <!-- Styles -->

    </head>
    <body>
        @include('inc.navbar')

        <main role="main" class="container" style="margin-top: 6%;">

            <div class="starter-template">
                @include('inc.messages')
                @yield('content')
            </div>

          </main>



          <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
          <script>
              CKEDITOR.replace( 'article-ckeditor' );
          </script>
    </body>
</html>
