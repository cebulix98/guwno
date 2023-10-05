<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>

    <style type="text/css">
        @font-face {
            font-family: 'Times New Roman';
            src: url("{{  asset('fonts/Times New Roman.ttf') }}");
        }
    </style>

    <style>
        .page-break {
            page-break-after: always;
        }
    </style>

    @include('rtf.rtf_head')


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"/>
</head>

<body>

    <!-- NAGŁÓWEK -->


    @yield('content')
</body>

</html>