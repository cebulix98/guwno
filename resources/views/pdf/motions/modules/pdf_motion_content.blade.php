<table class="table table-bordered" style="border: 1px solid black">
    <tr>
        <th>{{__('attributes.content_title')}}</th>
        <td class="text-right">{{isset($parameters->attributes['content_title']) ? $parameters->attributes['content_title'] : ''}}</td>
    </tr>
    <tr>
        <th>{{__('attributes.content')}}</th>
        <td class="text-right">{{isset($parameters->attributes['content']) ? $parameters->attributes['content'] : ''}}</td>
    </tr>
</table>