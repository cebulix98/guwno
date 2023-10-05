<h4><b>{{__('headlines.penalty_data')}}</b></h4>
<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.penalty_court')}}</th>
            <td>{{isset($parameters->attributes['penalty_court']) ? $parameters->attributes['penalty_court'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.penalty_date')}}</th>
            <td>{{isset($parameters->attributes['penalty_date']) ? $parameters->attributes['penalty_date'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.penalty_signature')}}</th>
            <td>{{isset($parameters->attributes['penalty_signature']) ? $parameters->attributes['penalty_signature'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.penalty_size')}}</th>
            <td>{{isset($parameters->attributes['penalty_size']) ? $parameters->attributes['penalty_size'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.is_penalty_previous')}}</th>
            <td>
                @if(isset($parameters->attributes['is_penalty_previous']) && $parameters->attributes['is_penalty_previous']==1)
                {{__('labels.yes')}}
                @else
                {{__('labels.no')}}
                @endif
            </td>
        </tr>
    </table>
</div>