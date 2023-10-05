<h4><b>{{__('headlines.convict_family')}}</b></h4>
<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.convict_behaviour')}}</th>
            <td>{{isset($parameters->attributes['convict_behaviour']) ? $parameters->attributes['convict_behaviour'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.convict_employment')}}</th>
            <td>{{isset($parameters->attributes['convict_employment']) ? $parameters->attributes['convict_employment'] : ''}}</td>
        </tr>

        <tr>
            <th>{{__('attributes.supervision_schedule')}}</th>
            <td>{{isset($parameters->attributes['supervision_schedule']) ? $parameters->attributes['supervision_schedule'] : ''}}</td>
        </tr>
    </table>
</div>