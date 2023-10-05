@extends('pdf.pdf_layout')
@section('content')
<!-- 1 STRONA -->
<div class="p-1">
    <div class="text-right">Utworzono: {{date("Y-m-d", strtotime($parameters->case->created_at ?? ''))}}</div>
</div>

<h4><b>{{__('motions.title_motion_type_9')}}</b></h4>

@include('pdf/motions/modules/pdf_motion_basic')
@include('pdf/motions/modules/pdf_motion_trial_details')
@include('pdf/motions/modules/pdf_motion_contact_pick')
@include('pdf/motions/modules/pdf_motion_note')


@endsection