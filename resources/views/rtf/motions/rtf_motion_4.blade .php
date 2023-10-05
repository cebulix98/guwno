@extends('rtf.rtf_layout')
@section('content')
<!-- 1 STRONA -->

<h4><b>{{__('motions.title_motion_type_4')}}</b></h4>

<div class="p-3">
@include('rtf/motions/modules/rtf_motion_basic')
    @if($parameters->attributes)
    @include('rtf/motions/modules/rtf_motion_convict')
    @include('rtf/motions/modules/rtf_motion_convict_address')
    @include('rtf/motions/modules/rtf_motion_convict_penalty')
    <h4 class="section-title text-left"><span class=" ml-3 ">{!!__('headlines.penalty_delay')!!}</span></h4>
    @include('rtf/motions/modules/rtf_motion_penalty_delay_illness')
    @endif
</div>


@endsection