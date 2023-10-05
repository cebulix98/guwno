<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.penalty_delay_family')}}</th>
            <td>{{isset($parameters->attributes['penalty_delay_family']) ? $parameters->attributes['penalty_delay_family'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.penalty_delay_finance')}}</th>
            <td>{{isset($parameters->attributes['penalty_delay_finance']) ? $parameters->attributes['penalty_delay_finance'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.penalty_delay_residence')}}</th>
            <td>{{isset($parameters->attributes['penalty_delay_residence']) ? $parameters->attributes['penalty_delay_residence'] : ''}}</td>
        </tr>
    </table>
</div>