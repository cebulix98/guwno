<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.penalty_data')}}</span></h4>

<div class="col-12 p-0 m-0 row">
    <div class="col-md-12 mb-2">
        <label class="required text-uppercase">{{__('attributes.penalty_court')}}</label>
        <small>{{__('placeholders.penalty_court')}}</small>
        <input required placeholder="{{__('attributes.penalty_court')}}" name="penalty_court" class="form-control" type="text" value="{{isset($parameters->attributes['penalty_court']) ? $parameters->attributes['penalty_court'] : ''}}">
    </div>

    <div class="col-md-12 mb-2">
        <label class="required text-uppercase">{{__('attributes.penalty_date')}}</label>
        <input required placeholder="{{__('attributes.penalty_date')}}" name="penalty_date" class="form-control" type="date" value="{{isset($parameters->attributes['penalty_date']) ? $parameters->attributes['penalty_date'] : ''}}">
    </div>

    <div class="col-md-12 mb-2">
        <label class="required text-uppercase">{{__('attributes.penalty_signature')}}</label>
        <small>{{__('placeholders.penalty_signature')}}</small>
        <input required placeholder="{{__('placeholders.penalty_signature')}}" name="penalty_signature" class="form-control" type="text" value="{{isset($parameters->attributes['penalty_signature']) ? $parameters->attributes['penalty_signature'] : ''}}">
    </div>

    <div class="col-md-12 mb-2">
        <label class="required text-uppercase">{{__('attributes.penalty_size')}}</label>
        <small>{{__('placeholders.penalty_size')}}</small>
        <input required placeholder="{{__('placeholders.penalty_size')}}" name="penalty_size" class="form-control" type="text" value="{{isset($parameters->attributes['penalty_size']) ? $parameters->attributes['penalty_size'] : ''}}">
    </div>

    <div class="col-12 mb-2">
        <div>
        <label class="required text-uppercase">{{__('attributes.is_penalty_previous')}}</label>
        </div>
        @if(isset($parameters->attributes['is_penalty_previous']) && $parameters->attributes['is_penalty_previous']==1)
        {{__('labels.yes')}}
        @else 
        {{__('labels.no')}}
        @endif
    </div>
</div>