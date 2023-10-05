@extends('pdf.pdf_layout')
@section('content')
<!-- 1 STRONA -->
<div class="p-1">
    <div class="text-right">Utworzono: {{date("Y-m-d", strtotime($parameters->case->created_at ?? ''))}}</div>
</div>

<h4><b>{{__('motions.title_motion_type_6')}}</b></h4>

@include('pdf/motions/modules/pdf_motion_basic')
@include('pdf/motions/modules/pdf_motion_convict')
@include('pdf/motions/modules/pdf_motion_convict_address')
@include('pdf/motions/modules/pdf_motion_convict_penalty')
<h4 class="section-title text-left"><span class=" ml-3 ">{!!__('headlines.penalty_break_reason')!!}</span></h4>
@include('pdf/motions/modules/pdf_motion_penalty_delay_illness')

@endsection