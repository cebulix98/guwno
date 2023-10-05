<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.trial_date')}}</th>
            <td>{{isset($parameters->attributes['trial_date']) ? $parameters->attributes['trial_date'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.trial_time')}}</th>
            <td>{{isset($parameters->attributes['trial_time']) ? $parameters->attributes['trial_time'] : ''}}</td>
        </tr>
    </table>
</div>