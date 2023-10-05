@extends('rtf.rtf_layout')
@section('content')
<!-- 1 STRONA -->

<h4><b>{{__('motions.title_motion_type_2')}}</b></h4>

<div class="p-3">
    @include('rtf/motions/modules/rtf_motion_basic')
    @if($parameters->attributes)
    @include('rtf/motions/modules/rtf_motion_trial_details')
    @include('rtf/motions/modules/rtf_motion_contact_pick')
    @include('rtf/motions/modules/rtf_motion_note')
    @endif
</div>


@endsection