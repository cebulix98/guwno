@extends('layouts.app')
@section('title') {{__('titles.title_dictionaries')}} @endsection
@section('content')

<div class="col-12 row m-0 p-0 align-items-center">
    <div class="col-12">
        @include('subpages/settings/admin/settings_admin_menu')
    </div>

  

    <div class="py-12 w-100">
        <div class="max-w-full mx-auto">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="table-responsive">
                    <table class="table table-auto">
                        <thead>
                            <tr>
                                <th >{{__('table_heads.name')}}</th>
                                <th >{{__('table_heads.is_editable')}}</th>
                                <th >{{__('table_heads.options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                            @if($model->is_visible)
                            <tr class="background-table-body-dark">
                                <td >{{$model->name}}</td>
                                <td class="font-bold @if($model->is_editable) green @else red @endif">{{($model->is_editable) ?  __('labels.yes'):__('labels.no')}}</td>
                                <td >
                                    <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route('admin.dictionary.expanded',['id'=>$model->id])}}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @if($model->id==$current)
                            <tr class="collapse @if($model->id==$current) show @endif" id="collapse_expand{{$model->id}}">
                                <td colspan=5>
                                    <div class="card card-body p-0">
                                        <div class="col-md-12 p-0">
                                            @include('subpages/dictionaries/dictionaries_expanded')
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

