@extends('mail.mail_layout')
@section('content')

{!! $content !!}

<hr class='w-100'/>

{!! $response->footer ?? '' !!}

@endsection