<h4 class="section-title text-left"><span class=" ml-3 ">{{__('attributes.convict_address')}}</span></h4>
<div class="col-12 p-0 m-0 row">
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_address_street')}}</label>
        <input required placeholder="{{__('placeholders.convict_address_street')}}" name="convict_address_street" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_address_street_number_building')}}</label>
        <input required placeholder="{{__('placeholders.convict_address_street_number_building')}}" name="convict_address_street_number_building" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_address_street_number_apartament')}}</label>
        <input required placeholder="{{__('placeholders.convict_address_street_number_apartament')}}" name="convict_address_street_number_apartament" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_address_postal_code')}}</label>
        <input required placeholder="{{__('placeholders.convict_address_postal_code')}}" name="convict_address_postal_code" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_address_city')}}</label>
        <input required placeholder="{{__('placeholders.convict_address_city')}}" name="convict_address_city" class="form-control" type="text">
    </div>
    <div class="col-md-12 my-2">
        <div class="d-flex align-items-center">
            <label class="form_label text-uppercase">{{__('attributes.convict_correctional facility')}}</label>
            <div class="mx-2">
                <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" title="{{__('attributes.convict_correctional facility')}}" data-content="{{__('placeholders.convict_correctional facility')}}" data-trigger="focus">
                    <i class="far fa-question-circle"></i>
                </button>
            </div>
        </div>

        <input placeholder="{{__('placeholders.convict_correctional facility')}}" name="convict_correctional facility" class="form-control" type="text">
    </div>
</div>