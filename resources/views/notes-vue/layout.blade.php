@if (config('app.env') === 'production')
@php($minificator = '.min')
@else
@php($minificator = '')
@endif

    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap{{$minificator}}.css"
          rel="stylesheet">
    <link href="{!! asset('css/app'.$minificator.'.css') !!}" media="all" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="container" id="notes-app">

    <div class="container mt40">
        <app></app>
    </div>

    <div class="row mt40">
        <div class="col-lg-12 text-center"><span class="small">(c) Sergei Safarov</span></div>
    </div>

</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
