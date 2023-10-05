<h4><b>{{__('attributes.convict_address')}}</b></h4>
<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.convict_address_street')}}</th>
            <td>{{isset($parameters->attributes['convict_address_street']) ? $parameters->attributes['convict_address_street'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_address_street_number_building')}}</th>
            <td>{{isset($parameters->attributes['convict_address_street_number_building']) ? $parameters->attributes['convict_address_street_number_building'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_address_street_number_apartament')}}</th>
            <td>{{isset($parameters->attributes['convict_address_street_number_apartament']) ? $parameters->attributes['convict_address_street_number_apartament'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_address_postal_code')}}</th>
            <td>{{isset($parameters->attributes['convict_address_postal_code']) ? $parameters->attributes['convict_address_postal_code'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_address_city')}}</th>
            <td>{{isset($parameters->attributes['convict_address_city']) ? $parameters->attributes['convict_address_city'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_correctional facility')}}</th>
            <td>{{isset($parameters->attributes['convict_correctional_facility']) ? $parameters->attributes['convict_correctional_facility'] : ''}}</td>
        </tr>
    </table>
</div>