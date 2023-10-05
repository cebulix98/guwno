<!DOCTYPE html>
@extends('layouts.app')
@section('title') {{__('titles.title_motions')}} @endsection
@section('content')

<div class="col-12 row m-0 p-0 align-items-center">
    <div class="my-2">
        <h4>[{{$current->id}}] {{$current->name}} </h4>
    </div>
    <div class="float-right ml-auto">
        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="{{route('admin.motions.prices')}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.back')}}">
            <i class="fas fa-eye-slash"></i>
        </a>
    </div>

    <div class="col-12 my-2 row">
        <button type="submit" class="btn btn-primary btn-lg mx-2" form="form_fill_items">
            <i class="fas fa-plus"></i> {{__('buttons.fill')}}
        </button>

        <button class="btn btn-primary btn-lg mx-2" data-target="#collapse_prices_update_mass" aria-controls="#collapse_prices_update_mass" aria-expanded="false" data-toggle="collapse">
            <i class="fas fa-pencil-alt"></i> {{__('buttons.mass_edit')}}
        </button>
    </div>

    <form id="form_fill_items" method="POST" action="{{route('admin.motions.prices.manage.fill')}}" enctype="multipart/form-data" class="hidden">
        @csrf
        <input type="hidden" name="id" value="{{$current->id ?? ''}}">
    </form>

    {{$models->links()}}

    <div class="col-12 my-2 collapse" id="collapse_prices_update_mass">
        <form method="POST" action="{{route('admin.motions.prices.update.all')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$current->id ?? ''}}">

            <table class="table table-sm">
                @foreach($models as $model)
                <tr>
                    <td>{{$model->motion->id ?? ''}}</td>
                    <td>
                        <label class="required text-uppercase">{{__('attributes.single_price_brutto')}}</label>
                        <input required name="single_price_brutto_{{$model->id}}" class="form-control" type="number" min=0 step="0.01" value="{{$model->single_price_brutto}}">
                    </td>

                    <td>
                        <label class="required text-uppercase">{{__('attributes.vat_rate')}} %</label>
                        <input required name="vat_rate_{{$model->id}}" class="form-control" type="number" value="{{$model->vat_rate*100}}" min=0>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="float-right">
                <button type="submit" class="btn btn-primary m-1 btn-lg"><i class="fas fa-save"></i></button>
            </div>
        </form>
    </div>

    <div class="table-responsive my-2">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>{{__('table_heads.id')}}</th>
                    <th>{{__('table_heads.name')}}</th>
                    <th>{{__('table_heads.single_price_netto')}}</th>
                    <th>{{__('table_heads.single_price_brutto')}}</th>
                    <th>{{__('table_heads.vat_rate')}}</th>
                    <th>{{__('table_heads.total_price_netto')}}</th>
                    <th>{{__('table_heads.total_price_brutto')}}</th>
                    <th>{{__('table_heads.options')}}</th>
                    <!-- <th >{{__('table_heads.select')}}</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                <tr class="@if($model->id==$current_id) background-table-body-dark @endif">
                    <td>{{$model->motion->id ?? ''}}</td>
                    <td>{{$model->motion->name ?? ''}}</td>
                    <td>{{$model->single_price_netto}}</td>
                    <td>{{$model->single_price_brutto}}</td>
                    <td>{{$model->vat_rate*100}}%</td>
                    <td>{{$model->total_price_netto}}</td>
                    <td>{{$model->total_price_brutto}}</td>
                    <td>
                        <button class="btn btn-primary" data-target="#collapse_prices_update_{{$model->id}}" aria-controls="#collapse_prices_update_{{$model->id}}" aria-expanded="false" data-toggle="collapse">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </td>
                </tr>
                <tr class="collapse" id="collapse_prices_update_{{$model->id}}">
                    <td colspan=7>
                        <form method="POST" action="{{route('admin.motions.prices.update.price')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$model->id ?? ''}}">

                            <div class="col-12 row">
                                <div class="col-md-4">
                                    <label class="required text-uppercase">{{__('attributes.single_price_brutto')}}</label>
                                    <input required name="single_price_brutto" class="form-control" type="number" min=0 step="0.01" value="{{$model->single_price_brutto}}">
                                </div>

                                <div class="col-md-4">
                                    <label class="required text-uppercase">{{__('attributes.vat_rate')}} %</label>
                                    <input required name="vat_rate" class="form-control" type="number" value="{{$model->vat_rate*100}}" min=0>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary m-1 btn-lg"><i class="fas fa-save"></i></button>
                                </div>
                            </div>



                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection

<script src="{{ mix('/js/subpages/motions/motions.js') }}" defer></script>