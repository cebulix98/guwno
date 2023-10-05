<!DOCTYPE html>
@extends('layouts.app')
@section('title') {{__('titles.title_motions')}} @endsection
@section('content')

<div class="col-md-12 row m-0 p-0 align-items-center">
    {{$models->links()}}

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>{{__('table_heads.id')}}</th>
                    <th>{{__('table_heads.name')}}</th>
                    <th>{{__('table_heads.url')}}</th>
                    <th>{{__('table_heads.options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                <tr class="@if($model->id==$current_id) background-table-body-dark @endif">
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->url}}</td>
                    <td>
                        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="{{route('admin.motions.prices.single',['id'=>$model->id])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.open')}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <!-- <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="//{{$model->url}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.move')}}">
                            <i class="fas fa-arrow-right"></i>
                        </a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

<script src="{{ mix('/js/subpages/motions/motions.js') }}" defer></script>