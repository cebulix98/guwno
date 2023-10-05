@extends('layouts.app')
@section('title') {{__('titles.title_contractors')}} @endsection
@section('content')
@include('subpages/contractors/modal/contractors_modal_add')
@include('subpages/contractors/modal/contractors_modal_contacts')

<div class="col-md-12 row m-0 p-0 align-items-center">
    <div class="col-md-12 row text-right justify-content-end">
        <div class="col-md-3 mb-2">
            <button  class="btn btn-primary btn-lg" data-title="{{__('modals.title_add_contractor')}}" data-toggle="modal" data-target="#contractors_modal_add" onclick="ShowModal(this, ContractorsModalAdd)">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    {{$models->links()}}

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th >{{__('table_heads.type')}}</th>
                    <th >{{__('table_heads.name')}}</th>
                    <th >{{__('table_heads.nip')}}</th>
                    <th >{{__('table_heads.address')}}</th>
                    <th >{{__('table_heads.options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                <tr class="@if($model->id==$current_id) background-table-body-dark @endif">
                    <td >@if($model->type_id==1) <i class="far fa-user"></i> @else <i class="far fa-building"></i> @endif</td>
                    <td >{{$model->shortname}}</td>
                    <td >{{$model->nip}}</td>
                    <td >{{$model->postal_code}} {{$model->city}} {{$model->street}}</td>
                    <td >
                        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route('admin.contractors.expanded',['id'=>$model->id])}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @if($model->id==$current_id)
                        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route('admin.contractors')}}">
                            <i class="fas fa-eye-slash"></i>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($current)
        <div class="col-12 p-0 m-0">
            @include('subpages/contractors/contractors_owned_expanded')
        </div>
        @endif
    </div>

</div>
@endsection

<script src="{{ mix('/js/subpages/contractors/contractors.js') }}" defer></script>
<script src="{{ mix('/js/subpages/contractors/contractors_modal_add.js') }}" defer></script>
<script src="{{ mix('/js/subpages/contractors/contractors_modal_details.js') }}" defer></script>
<script src="{{ mix('/js/subpages/contractors/contractors_modal_contacts.js') }}" defer></script>