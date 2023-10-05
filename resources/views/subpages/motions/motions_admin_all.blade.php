<!DOCTYPE html>
@extends('layouts.app')
@section('title') {{__('titles.title_motions')}} @endsection
@section('content')

<div class="col-md-12 row m-0 p-0 align-items-center">
    @if($current)
    <div class="col-12 p-0 m-0">
        @include('subpages/motions/expanded/motions_all_expanded')
    </div>
    @endif

    {{$models->links()}}

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>{{__('table_heads.id')}}</th>
                    <th>{{__('table_heads.name')}}</th>
                    <th>{{__('table_heads.open')}}</th>
                    <!-- <th >{{__('table_heads.select')}}</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                @include('subpages/motions/table/motions_all_table')
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

<script src="{{ mix('/js/subpages/motions/motions.js') }}" defer></script>