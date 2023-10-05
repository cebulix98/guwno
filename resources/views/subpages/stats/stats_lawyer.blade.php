<!DOCTYPE html>
@extends('layouts.app')
@section('title') {{__('titles.title_stats')}} @endsection
@section('content')

<div class="col-md-12 row m-0 p-0 align-items-center">
    @if($current)
    <div class="col-12 p-0 m-0">

    </div>
    @endif

    {{$models->links()}}

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th >{{__('table_heads.name')}}</th>
                    <th class=" background-table-body-dark">{{__('table_heads.count_cases_all')}}</th>
                    <th >{{__('table_heads.count_cases_wait_open')}}</th>
                    <th >{{__('table_heads.count_cases_opened')}}</th>
                    <th >{{__('table_heads.count_cases_closed')}}</th>
                    <th >{{__('table_heads.count_cases_cancelled')}}</th>
                    <th class=" background-table-header-light">{{__('table_heads.count_cases_archived')}}</th>
                    <th >{{__('table_heads.options')}}</th>
                    <!-- <th >{{__('table_heads.select')}}</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                @if($model)
                <tr>
                    <td >{{$model->name}}</td>
                    <td class=" background-table-body-dark">{{$model->CountCasesAll()}}</td>
                    <td >{{$model->CountCasesWaitOpen()}}</td>
                    <td >{{$model->CountCasesOpened()}}</td>
                    <td >{{$model->CountCasesClosed()}}</td>
                    <td >{{$model->CountCasesCancelled()}}</td>
                    <td class=" border background-table-header-light">{{$model->CountCasesArchived()}}</td>
                    <td ></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

<script src="{{ mix('/js/subpages/motions/motions.js') }}" defer></script>