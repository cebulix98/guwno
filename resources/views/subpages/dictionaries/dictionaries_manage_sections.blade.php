@extends('layouts.app')
@section('title') {{__('titles.title_dictionaries')}} @endsection
@section('content')

<div class="col-12 row m-0 p-0 align-items-center">
    <div class="col-12">
        @include('subpages/settings/admin/settings_admin_menu')
    </div>

    <div class="py-12 w-100">

        <a class="btn btn-primary" href="{{route('admin.dictionary') }}">{{__('buttons.back')}}</a>

        <div class="w-100 py-2">
            @include('subpages/dictionaries/dictionaries_sections')
        </div>

    </div>

</div>
@endsection

<script src="{{ mix('/js/subpages/dictionary/dictionaries_ection_categories.js') }}" defer></script>