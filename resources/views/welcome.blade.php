@if (config('app.env') === 'production')
    @php($minificator = '.min')
@else
    @php($minificator = '')
@endif

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap{{$minificator}}.css"
              rel="stylesheet">
        <link href="{!! asset('css/app'.$minificator.'.css') !!}" media="all" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name') }}
                </div>
                <div class="align-content-center">
                    <a href="{{route('notes.index')}}" id="app-classic" class="btn btn-primary">Goto classic notes application</a>
                    <a href="{{route('index-new')}}" id="app-modern" class="btn btn-success">Goto modern notes application</a>
                </div>
                <br/>
                <div class="links">
                    <a href="http://sergeysafarov.com" class="small">Sergei Safarov</a>
                    <a href="https://linkedin.com/in/sergei-safarov-developer" class="small">Linked In</a>
                    <a href="https://github.com/ssafarov/notes-app" class="small">Github</a>
                </div>
            </div>
        </div>
    </body>
</html>
