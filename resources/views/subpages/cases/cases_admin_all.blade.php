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


    <div class="col-12 row text-right justify-content-end">
        <div class="mb-2 mr-auto">
            <a class="btn btn-primary btn-lg" href="{{route('admin.cases')}}">
                {{__('buttons.active')}}
            </a>
            @if(!$filter_is_archived)
            <a class="btn btn-primary btn-lg" href="{{route('admin.cases.filters.archive',['is_archived'=>1])}}">
                {{__('buttons.archive')}}
            </a>
            @endif
        </div>

        @if(Auth::user()->IsPermitted('mcases','can_delete'))
        <div class="mb-2">
            <button type="submit" class="btn btn-primary btn-lg" form="form_select_items">
                <i class="fas fa-minus"></i> {{__('buttons.delete_selected')}}
            </button>
        </div>
        @endif
    </div>

    <form id="form_select_items" method="POST" action="{{route('cases.delete.selected')}}" enctype="multipart/form-data" class="hidden">
        @csrf
    </form>

    {{$models->links()}}

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th >{{__('table_heads.status_payment')}}</th>
                    <th >{{__('table_heads.status')}}</th>
                    <th >{{__('table_heads.name')}}</th>
                    <th >{{__('table_heads.motion')}}</th>
                    <th >{{ __('table_heads.petitioner') }}</th>
                    <th >{{ __('table_heads.lawyer') }}</th>
                    <th >{{ __('table_heads.origin') }}</th>
                    <th >{{__('table_heads.created_at')}}</th>
                    <th >{{__('table_heads.open')}}</th>
                    <th >{{__('table_heads.select')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th></th>
                    <th >
                        <div class="input-group">
                            <select name="status_id" class="form-control text-uppercase" form="form_item_search_status">
                                @foreach ($dict_statuses as $status)
                                <option value="{{ $status->id }}" @if($filter_status_id==$status->id) selected @endif>{{ $status->name }}</option>
                                @endforeach
                            </select>
                            <button form="form_item_search_status" type="submit" class="btn btn-primary ">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </th>
                    <th >
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" form="form_item_search_name" value="{{$filter_name ?? ''}}">
                            <button form="form_item_search_name" type="submit" class="btn btn-primary ">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </th>
                    <th >
                        <div class="input-group">
                            <select name="motion_id" class="form-control text-uppercase" form="form_item_search_motion">
                                @foreach ($dict_motions as $motion)
                                <option value="{{ $motion->id }}" @if($filter_motion_id==$motion->id) selected @endif>{{ $motion->name }}</option>
                                @endforeach
                            </select>
                            <button form="form_item_search_motion" type="submit" class="btn btn-primary ">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </th>
                    <th >
                        <div class="input-group">
                            <input type="text" class="form-control" name="petitioner" form="form_item_search_petitioner" value="{{$filter_petitioner ?? ''}}">
                            <button form="form_item_search_petitioner" type="submit" class="btn btn-primary ">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </th>
                    <th >
                        <div class="input-group">
                            <!-- <input type="text" class="form-control" name="" form="form_item_search_lawyer" value="{{$filter_lawyer ?? ''}}"> -->
                            <select name="lawyer" class="form-control text-uppercase" form="form_item_search_lawyer">
                                @foreach ($lawyers as $lawyer)
                                <option value="{{ $lawyer->id }}" @if($filter_lawyer==$lawyer->id) selected @endif>{{ $lawyer->firstname ?? '' }} {{ $lawyer->lastname ?? ''}}</option>
                                @endforeach
                            </select>
                            <button form="form_item_search_lawyer" type="submit" class="btn btn-primary ">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </th>
                    <th ></th>
                    <th ></th>
                    <th ></th>
                    <th ></th>
                </tr>
                @foreach($models as $model)
                @include('subpages/cases/table/cases_table')
                @endforeach
            </tbody>
        </table>
    </div>

    <form id="form_item_search_status" action="" method="POST" class="hidden" onsubmit="FilterCases(event, this, '/admin/cases')">
        @csrf
        <input type="hidden" name="filters" value="{{$filters ?? ''}}">
    </form>
    <form id="form_item_search_name" action="" method="POST" class="hidden" onsubmit="FilterCases(event, this, '/admin/cases')">
        @csrf
        <input type="hidden" name="filters" value="{{$filters ?? ''}}">
    </form>
    <form id="form_item_search_motion" action="" method="POST" class="hidden" onsubmit="FilterCases(event, this, '/admin/cases')">
        @csrf
        <input type="hidden" name="filters" value="{{$filters ?? ''}}">
    </form>
    <form id="form_item_search_petitioner" action="" method="POST" class="hidden" onsubmit="FilterCases(event, this, '/admin/cases')">
        @csrf
        <input type="hidden" name="filters" value="{{$filters ?? ''}}">
    </form>
    <form id="form_item_search_lawyer" action="" method="POST" class="hidden" onsubmit="FilterCases(event, this, '/admin/cases')">
        @csrf
        <input type="hidden" name="filters" value="{{$filters ?? ''}}">
    </form>
</div>
@endsection

<script src="{{ mix('/js/subpages/cases/cases.js') }}" defer></script>
<script src="{{ mix('/js/subpages/cases/cases_modal_add_lawyer.js') }}" defer></script>
<script src="{{ mix('/js/subpages/cases/cases_modal_quick_response.js') }}" defer></script>