<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.convict_data')}}</span></h4>

<div class="col-12 p-0 m-0 row">
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_firstname')}}</label>
        <input required placeholder="{{__('attributes.convict_firstname')}}" name="convict_firstname" class="form-control" type="text" value="{{isset($parameters->attributes['convict_firstname']) ? $parameters->attributes['convict_firstname'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_lastname')}}</label>
        <input required placeholder="{{__('attributes.convict_lastname')}}" name="convict_lastname" class="form-control" type="text" value="{{isset($parameters->attributes['convict_lastname']) ? $parameters->attributes['convict_lastname'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_family_lastname')}}</label>
        <input required placeholder="{{__('attributes.convict_family_lastname')}}" name="convict_family_lastname" class="form-control" type="text" value="{{isset($parameters->attributes['convict_family_lastname']) ? $parameters->attributes['convict_family_lastname'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_father_firstname')}}</label>
        <input required placeholder="{{__('attributes.convict_father_firstname')}}" name="convict_father_firstname" class="form-control" type="text" value="{{isset($parameters->attributes['convict_father_firstname']) ? $parameters->attributes['convict_father_firstname'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_mother_firstname')}}</label>
        <input required placeholder="{{__('attributes.convict_mother_firstname')}}" name="convict_mother_firstname" class="form-control" type="text" value="{{isset($parameters->attributes['convict_mother_firstname']) ? $parameters->attributes['convict_mother_firstname'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_mother_family_lastname')}}</label>
        <input required placeholder="{{__('attributes.convict_mother_family_lastname')}}" name="convict_mother_family_lastname" class="form-control" type="text" value="{{isset($parameters->attributes['convict_mother_family_lastname']) ? $parameters->attributes['convict_mother_family_lastname'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_date_birthday')}}</label>
        <input required placeholder="{{__('attributes.convict_date_birthday')}}" name="convict_date_birthday" class="form-control" type="date" value="{{isset($parameters->attributes['convict_date_birthday']) ? $parameters->attributes['convict_date_birthday'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_place_birthday')}}</label>
        <input required placeholder="{{__('attributes.convict_place_birthday')}}" name="convict_place_birthday" class="form-control" type="text" value="{{isset($parameters->attributes['convict_place_birthday']) ? $parameters->attributes['convict_place_birthday'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_pesel')}}</label>
        <input required placeholder="{{__('attributes.convict_pesel')}}" name="convict_pesel" class="form-control" type="text" value="{{isset($parameters->attributes['convict_pesel']) ? $parameters->attributes['convict_pesel'] : ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_identity_card')}}</label>
        <input required placeholder="{{__('attributes.convict_identity_card')}}" name="convict_identity_card" class="form-control" type="text" value="{{isset($parameters->attributes['convict_identity_card']) ? $parameters->attributes['convict_identity_card'] : ''}}">
    </div>
    <div class="col-md-12 mb-2">
        <label class="text-uppercase">{{__('attributes.convict_phone')}}</label>
        <small>{{__('placeholders.convict_phone')}}</small>
        <input placeholder="{{__('placeholders.convict_phone')}}" name="convict_phone" class="form-control" type="text" value="{{isset($parameters->attributes['convict_phone']) ? $parameters->attributes['convict_phone'] : ''}}">
    </div>
</div>