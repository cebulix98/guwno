@extends('pdf.pdf_layout')
@section('content')
<!-- 1 STRONA -->
<div class="p-1">
    <div class="text-right">Utworzono: {{date("Y-m-d", strtotime($parameters->case->created_at ?? ''))}}</div>
</div>

<div class="p-3">
    @include('pdf/motions/pdf_motion_basic')
    @if($parameters->attributes)
    @include('pdf/motions/pdf_motion_convict')
    @include('pdf/motions/pdf_motion_convict_address')
    @include('pdf/motions/pdf_motion_convict_penalty')
    @include('pdf/motions/pdf_motion_convict_family')
    @endif
</div>

@endsection