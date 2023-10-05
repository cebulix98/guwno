<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.convict_data')}}</span></h4>

<div class="col-12 p-0 m-0 row">
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_firstname')}}</label>
        <input required placeholder="{{__('placeholders.convict_firstname')}}" name="convict_firstname" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_lastname')}}</label>
        <input required placeholder="{{__('placeholders.convict_lastname')}}" name="convict_lastname" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_family_lastname')}}</label>
        <input required placeholder="{{__('placeholders.convict_family_lastname')}}" name="convict_family_lastname" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_father_firstname')}}</label>
        <input required placeholder="{{__('placeholders.convict_father_firstname')}}" name="convict_father_firstname" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_mother_firstname')}}</label>
        <input required placeholder="{{__('placeholders.convict_mother_firstname')}}" name="convict_mother_firstname" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_mother_family_lastname')}}</label>
        <input required placeholder="{{__('placeholders.convict_mother_family_lastname')}}" name="convict_mother_family_lastname" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_date_birthday')}}</label>
        <input required placeholder="{{__('placeholders.convict_date_birthday')}}" name="convict_date_birthday" class="form-control" type="date">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_place_birthday')}}</label>
        <input required placeholder="{{__('placeholders.convict_place_birthday')}}" name="convict_place_birthday" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_pesel')}}</label>
        <input required placeholder="{{__('placeholders.convict_pesel')}}" name="convict_pesel" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.convict_identity_card')}}</label>
        <input required placeholder="{{__('placeholders.convict_identity_card')}}" name="convict_identity_card" class="form-control" type="text">
    </div>
    <div class="col-md-6 my-2">
    <div class="d-flex align-items-center">
        <label class="form_label text-uppercase">{{__('attributes.convict_phone')}}</label>
        <div class="mx-2">
            <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" data-trigger="focus" data-content="{{__('placeholders.convict_phone')}}" title="{{__('attributes.convict_phone')}}">
                <i class="far fa-question-circle"></i>
            </button>
        </div>
    </div>
        <input placeholder="{{__('placeholders.convict_phone')}}" name="convict_phone" class="form-control" type="text">
    </div>
</div>