<div class="table-responsive">
    <table class="table table-sm">
        <thead>
            <!-- <tr>
                <th>{{__('table_heads.name')}}</th>
                <th></th>
            </tr> -->
        </thead>
        <tbody>
            @foreach($current->case_motion_fields as $field)
            <tr>
                <td>{{$field->field->name ?? ''}}</td>
                <td>{{$field->data ?? ''}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>