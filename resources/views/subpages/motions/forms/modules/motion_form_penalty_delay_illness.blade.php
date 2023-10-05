<div class="form-check">
    <input class="form-check-input" type="checkbox" name="is_penalty_delay_mental_illness" id="is_penalty_delay_mental_illness" value="1" onclick="ToggleDivById('is_penalty_delay_mental_illness_container',this.checked)">
    <label class="form-check-label" for="is_penalty_delay_mental_illness">{{__('attributes.penalty_delay_mental_illness')}}</label>
</div>
<div class="col-12 my-2 hidden" id="is_penalty_delay_mental_illness_container">
<div class="d-flex align-items-center">
    <label class="form_label text-uppercase">{{__('attributes.penalty_delay_mental_illness')}}</label>
    <div class="mx-2">
        <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" data-trigger="focus" data-content="{{__('placeholders.penalty_delay_mental_illness')}}" title="{{__('attributes.penalty_delay_mental_illness')}}">
            <i class="far fa-question-circle"></i>
        </button>
    </div>
</div>
    <textarea placeholder="{{__('placeholders.penalty_delay_mental_illness')}}" name="penalty_delay_mental_illness" class="form-control" type="text" rows=4></textarea>

    <div class="col-12">
        <label class="form_label">{{__('attributes.attach_documents')}} ({{__('attributes.penalty_delay_mental_illness')}})</label>
        <input type="file" class="form-control" name="attachements_penalty_delay_mental_illness[]" multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rtf,text/plain,application/pdf" />
    </div>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" name="is_penalty_delay_other_illness" id="is_penalty_delay_other_illness" value="1" onclick="ToggleDivById('is_penalty_delay_other_illness_container',this.checked)">
    <label class="form-check-label" for="is_penalty_delay_other_illness">{{__('attributes.penalty_delay_other_illness')}}</label>
</div>
<div class="col-12 my-2 hidden" id="is_penalty_delay_other_illness_container">
<div class="d-flex align-items-center">
    <label class="form_label text-uppercase">{{__('attributes.penalty_delay_other_illness')}}</label>
    <div class="mx-2">
        <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" data-trigger="focus" data-content="{{__('placeholders.penalty_delay_other_illness')}}" title="{{__('attributes.penalty_delay_other_illness')}}">
            <i class="far fa-question-circle"></i>
        </button>
    </div>
</div>
    <textarea placeholder="{{__('placeholders.penalty_delay_other_illness')}}" name="penalty_delay_other_illness" class="form-control" type="text" rows=4></textarea>

    <div class="col-12">
        <label class="form_label">{{__('attributes.attach_documents')}} ({{__('attributes.penalty_delay_other_illness')}})</label>
        <input type="file" class="form-control" name="attachements_penalty_delay_other_illness[]" multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rtf,text/plain,application/pdf" />
    </div>
</div>