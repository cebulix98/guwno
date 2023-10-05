<div class="form-check">
    <input class="form-check-input" type="checkbox" name="is_penalty_delay_family" id="is_penalty_delay_family" value="1" onclick="ToggleDivById('is_penalty_delay_family_container',this.checked)">
    <label class="form-check-label" for="is_penalty_delay_family">{{__('attributes.penalty_delay_family')}}</label>
</div>
<div class="col-12 my-2 hidden" id="is_penalty_delay_family_container">
<div class="d-flex align-items-center">
    <label class="form_label text-uppercase">{{__('attributes.penalty_delay_family')}}</label>
    <div class="mx-2">
        <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" data-trigger="focus" data-content="{{__('placeholders.penalty_delay_family')}}" title="{{__('attributes.penalty_delay_family')}}">
            <i class="far fa-question-circle"></i>
        </button>
    </div>
</div>
    <textarea placeholder="{{__('placeholders.penalty_delay_family')}}" name="penalty_delay_family" class="form-control" type="text" rows=5></textarea>

    <div class="col-12">
        <label class="form_label">{{__('attributes.attach_documents')}} ({{__('attributes.penalty_delay_family')}})</label> 
        <input required type="file" class="form-control" name="attachements_penalty_delay_family[]" multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rtf,text/plain,application/pdf" />
    </div>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" name="is_penalty_delay_finance" id="is_penalty_delay_finance" value="1" onclick="ToggleDivById('is_penalty_delay_finance_container',this.checked)">
    <label class="form-check-label" for="is_penalty_delay_finance">{{__('attributes.penalty_delay_finance')}}</label>
</div>
<div class="col-12 my-2 hidden" id="is_penalty_delay_finance_container">
<div class="d-flex align-items-center">
    <label class="form_label text-uppercase">{{__('attributes.penalty_delay_finance')}}</label>
    <div class="mx-2">
        <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" data-trigger="focus" data-content="{{__('placeholders.penalty_delay_finance')}}" title="{{__('attributes.penalty_delay_finance')}}">
            <i class="far fa-question-circle"></i>
        </button>
    </div>
</div>
    <textarea placeholder="{{__('placeholders.penalty_delay_finance')}}" name="penalty_delay_finance" class="form-control" type="text" rows=5></textarea>

    <div class="col-12">
        <label class="form_label">{{__('attributes.attach_documents')}} ({{__('attributes.penalty_delay_finance')}})</label> 
        <input type="file" class="form-control" name="attachements_penalty_delay_finance[]" multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rtf,text/plain,application/pdf" />
    </div>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" name="is_penalty_delay_residence" id="is_penalty_delay_residence" value="1" onclick="ToggleDivById('is_penalty_delay_residence_container',this.checked)">
    <label class="form-check-label" for="is_penalty_delay_residence">{{__('attributes.penalty_delay_residence')}}</label>
</div>
<div class="col-12 my-2 hidden" id="is_penalty_delay_residence_container">
<div class="d-flex align-items-center">
    <label class="form_label text-uppercase">{{__('attributes.penalty_delay_residence')}}</label>
    <div class="mx-2">
        <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" data-trigger="focus" data-content="{{__('placeholders.penalty_delay_residence')}}" title="{{__('attributes.penalty_delay_residence')}}">
            <i class="far fa-question-circle"></i>
        </button>
    </div>
</div>
    <textarea placeholder="{{__('placeholders.penalty_delay_residence')}}" name="penalty_delay_residence" class="form-control" type="text" rows=5></textarea>

    <div class="col-12">
        <label class="form_label">{{__('attributes.attach_documents')}} ({{__('attributes.penalty_delay_residence')}})</label>
        <input type="file" class="form-control" name="attachements_penalty_delay_residence[]" multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rtf,text/plain,application/pdf" />
    </div>
</div>