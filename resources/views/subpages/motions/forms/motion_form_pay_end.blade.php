@extends('layouts.guest')
@section('title') {{__('titles.title_motions')}} @endsection
@section('content')

<div class="col-12 m-0 p-0">
    <div class="text-center align-center my-36">
        {!!__('headlines.motion_end_pay_thank_you')!!}

        <div class="py-6">
            <a class="btn btn-primary" href="{{$link}}">
                {{__('buttons.back')}}
            </a>
        </div>
    </div>
</div>
@endsection