<!DOCTYPE html>
@extends('layouts.app')
@section('title') {{__('titles.title_cases')}} @endsection
@section('content')
@include('subpages/cases/modal/cases_modal_add_lawyer')
@include('subpages/cases/modal/cases_modal_change_lawyer')
@include('subpages/cases/modal/cases_modal_quick_response')

<div class="col-md-12 row m-0 p-0 align-items-center">
    @if($current)
    <div class="col-12 p-0 m-0">
        @include('subpages/cases/expanded/cases_expanded')
    </div>
    @endif
</div>
@endsection

<script src="{{ mix('/js/subpages/cases/cases.js') }}" defer></script>
<script src="{{ mix('/js/subpages/cases/cases_modal_add_lawyer.js') }}" defer></script>
<script src="{{ mix('/js/subpages/cases/cases_modal_quick_response.js') }}" defer></script>