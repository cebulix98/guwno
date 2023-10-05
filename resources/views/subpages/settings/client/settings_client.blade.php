@extends('layouts.app')
@section('title') {{__('titles.title_panel')}} @endsection
@section('content')
<div class="col-md-12 row m-0 p-0 align-items-center">
    @include('subpages/settings/client/settings_client_menu')
</div>
@endsection

<script src="{{ mix('/js/subpages/settings/settings_client.js') }}" defer></script>