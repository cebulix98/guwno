<table class="table table-sm">
    <thead>
        <tr>
            <th >{{__('table_heads.status')}}</th>
            <th >{{__('table_heads.name')}}</th>
            <th >{{__('table_heads.motion')}}</th>
            <th >{{ __('table_heads.petitioner') }}</th>
            <th >{{ __('table_heads.lawyer') }}</th>
            <th >{{__('table_heads.options')}}</th>
        </tr>
    </thead>
    <tbody>
        <tr class="@if($current->id==$current_id) background-table-body-dark @endif">
            <td >{{$current->status->name ?? ''}}</td>
            <td >{{$current->name}}</td>
            <td >{{$current->motion->name ?? ''}}</td>
            <td >
                {{$current->lastname ?? ''}} {{$current->firstname ?? ''}}
            </td>
            <td >
                @if($current->GetPrimaryLawyer())
                {{$current->GetPrimaryLawyer()->user->firstname ?? ''}} {{$current->GetPrimaryLawyer()->user->lastname ?? ''}}
                @else
                <button  class="btn btn-danger btn-lg" data-title="{{__('modals.title_add_lawyer')}}" data-id="{{$current->id ?? ''}}" data-toggle="modal" data-target="#cases_modal_add_lawyer" onclick="ShowModal(this, CasesModalAddLawyer)">
                    <i class="fas fa-plus"></i>
                </button>
                @endif
            </td>
            <td >
                @if($current->id==$current_id)
                <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route($route_main)}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.close')}}">
                    <i class="fas fa-eye-slash"></i>
                </a>
                @endif
                @if(Auth::user()->IsPermitted('mcases','can_delete'))
                @if(!$current->deleted_at)
                <button form="form_delete_case_{{$current->id}}" type="submit" class="btn btn-danger btn-lg "><i class="fas fa-trash"></i></button>
                <form id="form_delete_case_{{$current->id}}" method="POST" action="{{route('cases.delete.case')}}" class="hidden" onsubmit="return DeleteElement()">
                    @csrf
                    <input type="hidden" name="id" value="{{$current->id}}">
                </form>
                @endif
                @endif
            </td>
        </tr>
    </tbody>
</table>