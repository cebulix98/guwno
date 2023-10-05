

<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.penalty_delay_mental_illness')}}</th>
            <td>{{isset($parameters->attributes['penalty_delay_mental_illness']) ? $parameters->attributes['penalty_delay_mental_illness'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.penalty_delay_other_illness')}}</th>
            <td>{{isset($parameters->attributes['penalty_delay_other_illness']) ? $parameters->attributes['penalty_delay_other_illness'] : ''}}</td>
        </tr>
    </table>
</div>