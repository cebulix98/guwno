<h4 class="section-title text-left"><span class=" ml-3 ">{!! __('headlines.penalty_data') !!}</span></h4>

<div class="col-12 p-0 m-0 row">
    <div class="col-md-12 my-2">
    <div class="d-flex align-items-center">
        <label class="form_label required text-uppercase">{{__('attributes.penalty_court')}}</label>
        <div class="mx-2">
            <button type="button" class="btn btn-link btn-lg" data-trigger="focus" data-toggle="popover" data-html="true" data-content="{{__('placeholders.penalty_court')}}" title="{{__('attributes.penalty_court')}}">
                <i class="far fa-question-circle"></i>
            </button>
        </div>
    </div>
        <input required placeholder="{{__('placeholders.penalty_court')}}" name="penalty_court" class="form-control" type="text">
    </div>

    <div class="col-md-12 my-2">
        <label class="form_label required text-uppercase">{{__('attributes.penalty_date')}}</label>
        <input required placeholder="{{__('attributes.penalty_date')}}" name="penalty_date" class="form-control" type="date">
    </div>

    <div class="col-md-12 my-2">
    <div class="d-flex align-items-center">
        <label class="form_label required text-uppercase">{{__('attributes.penalty_signature')}}</label>
        <div class="mx-2">
            <button type="button" class="btn btn-link btn-lg" data-trigger="focus" data-toggle="popover" data-html="true" data-content="{{__('placeholders.penalty_signature')}}" title="{{__('attributes.penalty_signature')}}">
                <i class="far fa-question-circle"></i>
            </button>
        </div>
    </div>
        <input required placeholder="{{__('placeholders.penalty_signature')}}" name="penalty_signature" class="form-control" type="text">
    </div>

    <div class="col-md-12 my-2">
    <div class="d-flex align-items-center">
        <label class="form_label required text-uppercase">{{__('attributes.penalty_size')}}</label>
        <div class="mx-2">
            <button type="button" class="btn btn-link btn-lg" data-trigger="focus" data-toggle="popover" data-html="true" data-content="{{__('placeholders.penalty_size')}}" title="{{__('attributes.penalty_size')}}">
                <i class="far fa-question-circle"></i>
            </button>
        </div>
    </div>
        <input required placeholder="{{__('placeholders.penalty_size')}}" name="penalty_size" class="form-control" type="text">
    </div>

    <div class="col-12 my-2">
        <div>
            <label class="form_label required text-uppercase">{{__('attributes.is_penalty_previous')}}</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_penalty_previous" id="is_penalty_previous1" value="1">
            <label class="form-check-label" for="is_penalty_previous1">{{__('labels.yes')}}</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_penalty_previous" id="is_penalty_previous2" value="0" checked>
            <label class="form-check-label" for="is_penalty_previous2">{{__('labels.no')}}</label>
        </div>
    </div>
</div>