<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.contact_data')}}</span></h4>

<div class="col-12 p-0 m-0 row">
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.firstname')}}</label>
        <input required placeholder="{{__('attributes.firstname')}}" name="firstname" class="form-control" type="text" value="{{$parameters->case->petitioner->firstname ?? ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.lastname')}}</label>
        <input required placeholder="{{__('attributes.lastname')}}" name="lastname" class="form-control" type="text" value="{{$parameters->case->petitioner->lastname ?? ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.phone')}}</label>
        <small>{{__('placeholders.phone')}}</small>
        <input required placeholder="{{__('placeholders.phone')}}" name="phone" class="form-control" type="text" value="{{$parameters->case->petitioner->phone ?? ''}}">
    </div>
    <div class="col-md-6 mb-2">
        <label class="required text-uppercase">{{__('attributes.email')}}</label>
        <small>{{__('placeholders.email')}}</small>
        <input required placeholder="{{__('placeholders.email')}}" name="email" class="form-control" type="email" value="{{$parameters->case->petitioner->email ?? ''}}">
    </div>
</div>