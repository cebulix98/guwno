@extends('rtf.rtf_layout')
@section('content')
<!-- 1 STRONA -->

<h4><b>{{__('motions.title_motion_type_10')}}</b></h4>

<div class="p-3">
    @include('rtf/motions/modules/rtf_motion_basic')
    @include('rtf/motions/modules/rtf_motion_content')
</div>


@endsection