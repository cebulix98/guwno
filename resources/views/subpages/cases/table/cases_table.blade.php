<tr class="@if($model->id==$current_id) background-table-body-dark @endif">
    <td >{{$model->order->status->name ?? ''}} @if($model->motion && $model->motion->settings && $model->motion->settings->is_free) {{__('labels.is_free')}} @endif</td>
    <td >{{$model->status->name ?? ''}}</td>
    <td >{{$model->name}}</td>
    <td >{{$model->motion->name ?? ''}}</td>
    <td >
        {{$model->lastname ?? ''}} {{$model->firstname ?? ''}}
    </td>
    <td >
        @if($model->GetPrimaryLawyer())
        {{$model->GetPrimaryLawyer()->user->firstname ?? ''}} {{$model->GetPrimaryLawyer()->user->lastname ?? ''}}
        @else
        <button  class="btn btn-danger btn-lg" data-title="{{__('modals.title_add_lawyer')}}" data-toggle="modal" data-target="#cases_modal_add_lawyer" data-id="{{$model->id ?? ''}}" onclick="ShowModal(this, CasesModalAddLawyer)">
            <i class="fas fa-plus"></i>
        </button>
        @endif
    </td>
    <td >{{$model->origin->url ?? ''}}</td>
    <td >{{$model->created_at ?? ''}}</td>
    <td >
        @if($model->id!=$current_id)
        <!-- @ if($model->order && $model->order->status_id==2) -->
        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route($route_expanded,['id'=>$model->id])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.open')}}">
            <i class="fas fa-eye"></i>
        </a>
        <!-- @ endif -->
        @endif
        @if($model->id==$current_id)
        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route($route_main)}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.close')}}">
            <i class="fas fa-eye-slash"></i>
        </a>
        @endif
    </td>
    <td >
        <div class="custom-control custom-switch">
            <input id="select_item_{{$model->id}}" type="checkbox" class="custom-control-input" name="items[]" value="{{$model->id}}" form="form_select_items">
            <label class="custom-control-label" for="select_item_{{$model->id}}"></label>
        </div>
    </td>
</tr>