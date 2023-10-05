<!DOCTYPE html>
@extends('layouts.app')
@section('title') {{__('titles.title_config')}} @endsection
@section('content')
@include('subpages/system/modal/smtp_create')
<div class="col-md-12">

    <div class="mb-2 row">
        <div class="col">
            <button  class="btn btn-primary" data-title="{{__('modals.title_create_smtp')}}" data-toggle="modal" data-target="#modal_smtp_create" onclick="ShowModal(this, ModalSmtpCreate)">
                {{__('buttons.create')}}
            </button>
        </div>
    </div>

    <div class="mt-2">
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th >
                            <input type="checkbox" class="form-control" name="all_smtp" value="1" form="form_group_test" onchange="CheckAllSmtp(this.checked)">
                        </th>
                        <th >{{__('table_heads.email_address')}}</th>
                        <th >{{__('table_heads.name')}}</th>
                        <th >{{__('table_heads.host')}}</th>
                        <th >{{__('table_heads.port')}}</th>
                        <th >{{__('table_heads.is_verified')}}</th>
                        <th >{{__('table_heads.options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($smtps as $smtp)
                    <tr>
                        <td >
                            <input type="checkbox" class="form-control" name="smtp[]" value="{{$smtp->id}}" form="form_group_test" checked>
                        </td>
                        <td >
                            {{$smtp->from_email}}
                        </td>
                        <td >
                            {{$smtp->from_name}}
                        </td>
                        <td >
                            {{$smtp->host}}
                        </td>
                        <td >
                            {{$smtp->port}}
                        </td>
                        <td class="font-weight-bold" id="is_verified{{$smtp->id}}">
                            @if($smtp->is_verified) <span class="green"> {{__('labels.yes')}} </span>
                            @else <span class="red"> {{__('labels.no')}} </span>
                            @endif
                        </td>
                        <td >
                            <div class="d-flex">
                                <span class="pr-2">
                                    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary"  data-toggle="collapse" data-target="#collapse_menu{{$smtp->id}}" aria-expanded="false" aria-controls="#collapse_menu{{$smtp->id}}">
                                        <i class="fas fa-cog"></i> <i class="fa fa-angle-down"></i>
                                        <span class="mb-1">
                                            <span></span>
                                        </span>
                                    </button>
                                </span>
                                <span class="pr-2">
                                    <button  class="btn btn-primary" onclick="TestConnection('{{$smtp->id}}')">
                                        Testuj
                                    </button>
                                </span>
                                <span class="pr-2">
                                    <form method="POST" action="{{route('system.smtp.delete')}}" onsubmit="return DeleteElement()">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$smtp->id}}">
                                        <button type="submit" class="btn btn-primary fas fa-trash-alt btn-lg"></button>
                                    </form>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="collapse" id="collapse_menu{{$smtp->id}}">
                        <td colspan=7>
                            <div class="card card-body col-12">
                                <div class="col-12">
                                    <form id="form_smtp_update" method="POST" action="{{ route('system.smtp.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$smtp->id}}">
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <label>{{__('attributes.host')}}</label>
                                                <input required placeholder="{{$smtp->host}}" name="host" class="mb-2 form-control" type="text" value="{{$smtp->host}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>{{__('attributes.port')}}</label>
                                                <input required placeholder="{{$smtp->port}}" name="port" class="mb-2 form-control" type="text" value="{{$smtp->port}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>{{__('attributes.username')}}</label>
                                                <input required placeholder="{{$smtp->username}}" name="username" class="mb-2 form-control" type="email" value="{{$smtp->username}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>{{__('attributes.password')}}</label>
                                                <input required placeholder="{{$smtp->password}}" name="password" class="mb-2 form-control" type="text" value="{{$smtp->password}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>{{__('attributes.encryption')}}</label>
                                                <select required name="encryption" class="form-control">
                                                    <option value=0>brak</option>
                                                    <option value="TLS" @if($smtp->encryption=='TLS') selected @endif >TLS</option>
                                                    <option value="SSL" @if($smtp->encryption=='SSL') selected @endif >SSL</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>{{__('attributes.from_email')}}</label>
                                                <input required placeholder="{{$smtp->from_email}}" name="from_email" class="mb-2 form-control" type="text" value="{{$smtp->from_email}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>{{__('attributes.from_name')}}</label>
                                                <input required placeholder="{{$smtp->from_name}}" name="from_name" class="mb-2 form-control" type="text" value="{{$smtp->from_name}}">
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-primary m-1" value="{{__('buttons.save')}}">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

<script src="{{ mix('/js/subpages/config/smtp.js') }}" defer></script>
<script src="{{ mix('/js/subpages/config/smtp_create.js') }}" defer></script>