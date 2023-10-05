<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.convict_family')}}</span></h4>

<div class="col-12 p-0 m-0 row">
    <div class="col-12 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_behaviour')}}</label>
        <textarea required placeholder="{{__('placeholders.convict_behaviour')}}" name="convict_behaviour" class="form-control" type="text" rows=3>{{isset($parameters->attributes['penalty_size']) ? $parameters->attributes['penalty_size'] : ''}}</textarea>
    </div>

    <div class="col-12 mb-2">
        <label class="required text-uppercase">{{__('attributes.convict_employment')}}</label>
        <textarea required placeholder="{{__('placeholders.convict_employment')}}" name="convict_employment" class="form-control" type="text" rows=3>{{isset($parameters->attributes['penalty_size']) ? $parameters->attributes['penalty_size'] : ''}}</textarea>
    </div>

    <div class="col-12 mb-2">
        <label class="required text-uppercase">{{__('attributes.supervision_schedule')}}</label>
        <textarea required placeholder="{{__('placeholders.supervision_schedule')}}" name="supervision_schedule" class="form-control" type="text" rows=3>{{isset($parameters->attributes['penalty_size']) ? $parameters->attributes['penalty_size'] : ''}}</textarea>
    </div>
</div>