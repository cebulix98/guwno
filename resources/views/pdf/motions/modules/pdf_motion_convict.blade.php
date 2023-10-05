<h4><b>{{__('headlines.convict_data')}}</b></h4>
<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.convict_firstname')}}</th>
            <td>{{isset($parameters->attributes['convict_firstname']) ? $parameters->attributes['convict_firstname'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_lastname')}}</th>
            <td>{{isset($parameters->attributes['convict_lastname']) ? $parameters->attributes['convict_lastname'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_family_lastname')}}</th>
            <td>{{isset($parameters->attributes['convict_family_lastname']) ? $parameters->attributes['convict_family_lastname'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_father_firstname')}}</th>
            <td>{{isset($parameters->attributes['convict_father_firstname']) ? $parameters->attributes['convict_father_firstname'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_mother_firstname')}}</th>
            <td>{{isset($parameters->attributes['convict_mother_firstname']) ? $parameters->attributes['convict_mother_firstname'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_mother_family_lastname')}}</th>
            <td>{{isset($parameters->attributes['convict_mother_family_lastname']) ? $parameters->attributes['convict_mother_family_lastname'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_date_birthday')}}</th>
            <td>{{isset($parameters->attributes['convict_date_birthday']) ? $parameters->attributes['convict_date_birthday'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_place_birthday')}}</th>
            <td>{{isset($parameters->attributes['convict_place_birthday']) ? $parameters->attributes['convict_place_birthday'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_pesel')}}</th>
            <td>{{isset($parameters->attributes['convict_pesel']) ? $parameters->attributes['convict_pesel'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_identity_card')}}</th>
            <td>{{isset($parameters->attributes['convict_identity_card']) ? $parameters->attributes['convict_identity_card'] : ''}}</td>
        </tr>
        <tr>
            <th>{{__('attributes.convict_phone')}}</th>
            <td>{{isset($parameters->attributes['convict_phone']) ? $parameters->attributes['convict_phone'] : ''}}</td>
        </tr>
    </table>
</div>