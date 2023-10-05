<div class="w-100 py-3">
    @if(!$current->GetPrimaryLawyer())
    <form id="case_add_lawyer_{{$current->id}}" method="POST" action="{{route('cases.manage.add.lawyer')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$current->id ?? ''}}">
        <input placeholder="{{__('labels.search')}}" name="lawyer_search" class="mb-2 form-control" type="text" onkeyup="FindLawyer('case_add_lawyer_{{$current->id}}')">
        <select required name="lawyer_id" class="form-control text-uppercase">
            @foreach ($lawyers as $lawyer)
            <option value="{{ $lawyer->id }}">{{ $lawyer->name }}</option>
            @endforeach
        </select>
        <div class="float-right my-3">
            <button type="submit" class="btn btn-primary fas fa-plus btn-lg"></button>
        </div>
    </form>
    @endif
</div>

<table class="table table-sm my-3">
    <tr>
        <th>{{__('table_heads.name')}}</th>
        <th>{{__('table_heads.phone')}}</th>
        <th>{{__('table_heads.email')}}</th>
        <th>{{__('table_heads.options')}}</th>
    </tr>

    @foreach($current->lawyers as $lawyer)
    <tr>
        <td>{{$lawyer->user->name ?? ''}}</td>
        <td>{{$lawyer->user->phone ?? ''}}</td>
        <td>{{$lawyer->user->email ?? ''}}</td>
        <td>
            <button  class="btn btn-primary btn-lg" data-title="{{__('modals.title_change_lawyer')}}" data-id="{{$current->id ?? ''}}" data-user_id="{{$lawyer->user_id}}" data-toggle="modal" data-target="#cases_modal_change_lawyer" onclick="ShowModal(this, CasesModalChangeLawyer)">
                <i class="fas fa-handshake"></i> {{__('buttons.swap')}}
            </button>
            <!-- <button form="form_delete_case_lawyer_{{$current->id}}_{{$lawyer->id}}" type="submit" class="btn btn-danger btn-lg "><i class="fas fa-trash"></i></button>
            <form id="form_delete_case_lawyer_{{$current->id}}_{{$lawyer->id}}" method="POST" action="{{route('cases.delete.case.lawyer')}}" class="hidden" onsubmit="return DeleteElement()">
                @csrf
                <input type="hidden" name="id" value="{{$lawyer->id}}">
            </form> -->
        </td>
    </tr>
    @endforeach
</table>