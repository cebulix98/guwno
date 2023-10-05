<table class="table table-sm my-3">
    <tr>
        <th>{{__('table_heads.created_at')}}</th>
        <th>{{__('table_heads.user')}}</th>
        <th>{{__('table_heads.event')}}</th>
    </tr>

    @foreach($current->history as $record)
    <tr>
        <td>{{$record->created_at}}</td>
        <td>{{$record->user->name ?? ''}}</td>
        <td>{{$record->name}}</td>
    </tr>
    @endforeach
</table>