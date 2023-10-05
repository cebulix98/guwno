<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>

    <link href="{{ asset('css/mail.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="col-md-12">

            <div class="col-md-12">
                <h4>Twoje konto zostało utworzone!</h4>

                <div>Twoje dane logowania:</div>


                <div>Email: {{$login}}</div>
                <div>Hasło: {{$password}}</div>

                To jest hasło tymczasowe, zmień je po zalogowaniu!

            </div>

        </div>
    </div>
</body>