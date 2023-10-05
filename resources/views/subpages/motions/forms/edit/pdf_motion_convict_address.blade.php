<h4 class="section-title text-left"><span class=" ml-3 ">{{__('attributes.convict_address')}}</span></h4>
<div class="col-12 p-0 m-0 row">
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_address_street')}}</label>
        <input required placeholder="{{__('attributes.convict_address_street')}}" name="convict_address_street" class="form-control" type="text" value="{{isset($parameters->attributes['convict_address_street']) ? $parameters->attributes['convict_address_street'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_address_street_number_building')}}</label>
        <input required placeholder="{{__('attributes.convict_address_street_number_building')}}" name="convict_address_street_number_building" class="form-control" type="text" value="{{isset($parameters->attributes['convict_address_street_number_building']) ? $parameters->attributes['convict_address_street_number_building'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_address_street_number_apartament')}}</label>
        <input required placeholder="{{__('attributes.convict_address_street_number_apartament')}}" name="convict_address_street_number_apartament" class="form-control" type="text" value="{{isset($parameters->attributes['convict_address_street_number_apartament']) ? $parameters->attributes['convict_address_street_number_apartament'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_address_postal_code')}}</label>
        <input required placeholder="{{__('attributes.convict_address_postal_code')}}" name="convict_address_postal_code" class="form-control" type="text" value="{{isset($parameters->attributes['convict_address_postal_code']) ? $parameters->attributes['convict_address_postal_code'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_address_city')}}</label>
        <input required placeholder="{{__('attributes.convict_address_city')}}" name="convict_address_city" class="form-control" type="text" value="{{isset($parameters->attributes['convict_address_city']) ? $parameters->attributes['convict_address_city'] : ''}}">
    </div>
    <div class="col-md-12 mb-2">
        <label class="text-uppercase">{{__('attributes.convict_correctional facility')}}</label>
        <small>{{__('placeholders.convict_correctional facility')}}</small>
        <input placeholder="{{__('placeholders.convict_correctional facility')}}" name="convict_correctional_facility" class="form-control" type="text" value="{{isset($parameters->attributes['convict_correctional_facility']) ? $parameters->attributes['convict_correctional_facility'] : ''}}">
    </div>
</div>