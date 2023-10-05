<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.note_description')}}</th>
            <td>{{isset($parameters->attributes['note']) ? $parameters->attributes['note'] : ''}}</td>
        </tr>
    </table>
</div>