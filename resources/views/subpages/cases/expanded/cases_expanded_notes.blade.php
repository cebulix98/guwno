<div class="w-100 py-3">
    <form method="POST" action="{{route('cases.manage.add.note')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$current->id ?? ''}}">
        <!-- <div class="float-right">
        <button  class="btn btn-link btn-lg">
            <i class="far fa-question-circle"></i>
        </button>
    </div> -->
        <textarea class="mb-2 form-control editor_textarea" name="note" rows=20 maxlength=500></textarea>
        <div class="float-right my-3">
            <button type="submit" class="btn btn-primary fas fa-plus btn-lg"></button>
        </div>
    </form>
</div>

<table class="table table-sm my-3">
    <tr>
        <th>{{__('table_heads.created_at')}}</th>
        <th>{{__('table_heads.updated_at')}}</th>
        <th>{{__('table_heads.user')}}</th>
        <th>{{__('table_heads.options')}}</th>
    </tr>

    @foreach($current->notes as $note)
    <tr>
        <td>{{$note->created_at}}</td>
        <td>{{$note->updated_at}}</td>
        <td>{{$note->user->name ?? ''}}</td>
        <td>
            <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route($route_expanded_notes,['id'=>$current->id, 'note_id'=>$note->id])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.open')}}">
                <i class="fas fa-eye"></i>
            </a>
            @if($note->id==$note_id)
            <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route($route_expanded_notes,['id'=>$current->id, 'note_id'=>0])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.close')}}">
                <i class="fas fa-eye-slash"></i>
            </a>
            @endif
            <button form="form_delete_case_note_{{$current->id}}_{{$note->id}}" type="submit" class="btn btn-danger btn-lg "><i class="fas fa-trash"></i></button>
            <form id="form_delete_case_note_{{$current->id}}_{{$note->id}}" method="POST" action="{{route('cases.delete.case.note')}}" class="hidden" onsubmit="return DeleteElement()">
                @csrf
                <input type="hidden" name="id" value="{{$note->id}}">
            </form>
        </td>
    </tr>
    @if($note->id==$note_id)
    <tr>
        <td colspan=3>{!!$note->note!!}</td>
    </tr>
    @endif
    @endforeach
</table>