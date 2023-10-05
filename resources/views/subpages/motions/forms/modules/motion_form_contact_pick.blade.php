<div class="col-12 my-2">
    <div class="d-flex align-items-center">
        <label class="form_label required text-uppercase">{{__('attributes.contact_phone_time')}}</label>
        <div class="mx-2">
            <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" title="{{__('attributes.contact_phone_time')}}" data-content="{{__('placeholders.contact_phone_time')}}" data-trigger="focus">
                <i class="far fa-question-circle"></i>
            </button>
        </div>
    </div>
    <select required name="contact_phone_time" class="form-control text-uppercase">
        <option value="09:00-15:00">09:00-15:00</option>
        <option value="15:00-19:00">15:00-19:00</option>
    </select>
</div>