@extends('layouts.guest')
@section('title') {{__('titles.title_motions')}} @endsection
@section('content')

<div class="col-12 m-0 p-0">
    <div class="text-center align-center my-36 ">
        <span class="white">{!!__('headlines.motion_end_thank_you')!!}</span>

        <div class="py-6">
            <a class="btn btn-primary" href="{{$link}}">
                {{__('buttons.back')}}
            </a>
        </div>
    </div>
</div>
@endsection