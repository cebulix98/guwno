<!DOCTYPE html>
@extends('layouts.app')
@section('title') {{__('titles.title_users')}} @endsection
@section('content')
@include('subpages/users/modal/users_modal_add')
@include('subpages/users/modal/users_modal_role')
@include('subpages/users/modal/users_modal_update_footer')

<div class="col-md-12 row m-0 p-0 align-items-center">


    <div class="col-md-12 row text-right justify-content-end">
        <div class="col-md-3 mb-2">
            <button class="btn btn-primary btn-lg" data-title="{{__('modals.title_update_footer')}}" data-content="{{$system_response_footer->content ?? ''}}" data-toggle="modal" data-target="#users_modal_update_footer" onclick="ShowModal(this, UsersModalUpdateFooter)">
                <i class="fas fa-pencil-alt"></i> {{__('buttons.footer')}}
            </button>
        </div>
        <div class="col-md-3 mb-2">
            <button class="btn btn-primary btn-lg" data-title="{{__('modals.title_add_user')}}" data-toggle="modal" data-target="#users_modal_add" onclick="ShowModal(this, UsersModalAdd)">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    {{$models->links()}}

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>{{__('table_heads.name')}}</th>
                    <th>{{__('table_heads.email')}}</th>
                    <th>{{__('table_heads.phone')}}</th>
                    <th>{{__('table_heads.role')}}</th>
                    <th>{{__('table_heads.is_auto_assigned')}}</th>
                    <th>{{__('table_heads.options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                <tr>
                    <td>{{$model->name}}</td>
                    <td>{{$model->email}}</td>
                    <td>{{$model->phone}}</td>
                    <td>
                        {{$model->role->name ?? ''}}
                    </td>
                    @if(Auth::user()->IsPermitted('madmin','can_edit'))
                    <td>
                        @if($model->role_id == 2 || $model->role_id == 4)
                        <form method="POST" action="{{route('users.update.user.auto_assign')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$model->id}}">
                            <button type="submit" class="btn @if($model->is_auto_assigned) btn-success @else btn-danger @endif btn-lg">
                                @if($model->is_auto_assigned)
                                <span class="text-green  font-bold">{{__('labels.yes')}}</span>
                                @else
                                <span class="text-red  font-bold">{{__('labels.no')}}</span>
                                @endif
                            </button>
                        </form>
                        @else
                        <span class="text-red  font-bold">{{__('labels.no')}}</span>
                        @endif
                    </td>
                    @endif
                    <td>
                        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="{{route('admin.users.expanded',['id'=>$model->id])}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        @if(!$model->IsSuperAdmin())
                        <button class="btn btn-primary btn-lg" data-title="{{__('modals.title_update_user_role')}}" data-id="{{$model->id}}" data-role="{{$model->role_id}}" data-toggle="modal" data-target="#users_modal_role" onclick="ShowModal(this, UsersModalRole)">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        @endif
                        @if(Auth::user()->IsPermitted('musers','can_delete'))
                        @if(!$model->deleted_at && !$model->IsSuperAdmin())
                        <button form="form_delete_user_{{$model->id}}" type="submit" class="btn btn-danger btn-lg "><i class="fas fa-trash"></i></button>
                        <form id="form_delete_user_{{$model->id}}" method="POST" action="{{route('users.delete.user')}}" class="hidden" onsubmit="return DeleteElement()">
                            @csrf
                            <input type="hidden" name="id" value="{{$model->id}}">
                        </form>
                        @endif
                        @endif
                    </td>
                </tr>
                @if($model->id==$current_id)
                <tr class="collapse @if($model->id==$current_id) show @endif" id="collapse_expand{{$model->id}}">
                    <td colspan=5>
                        <div class="card card-body">
                            <div class="col-md-12">
                                @include('subpages/users/users_expanded')
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

    <script src="{{ mix('/js/subpages/users/users.js') }}" defer></script>
    <script src="{{ mix('/js/subpages/users/users_modal_add.js') }}" defer></script>