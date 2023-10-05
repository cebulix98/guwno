<div class="col-12 my-2">
    <div>
        <label class="form_label required text-uppercase">{{__('attributes.is_convict_woman_child')}}</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_convict_woman_child" id="is_convict_woman_child1" value="1">
        <label class="form-check-label" for="is_convict_woman_child1">{{__('labels.yes')}}</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_convict_woman_child" id="is_convict_woman_child2" value="-1">
        <label class="form-check-label" for="is_convict_woman_child2">{{__('labels.no')}}</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_convict_woman_child" id="is_convict_woman_child2" value="0" checked>
        <label class="form-check-label" for="is_convict_woman_child2">{{__('labels.na')}}</label>
    </div>
</div>

<h4 class="section-title text-left"><span class=" ml-3 ">{!!__('headlines.penalty_delay')!!}</span></h4>

<div class="form-check">
    <input class="form-check-input" type="checkbox" name="is_penalty_delay_family_heavy" id="is_penalty_delay_family_heavy" value="1" onclick="ToggleDivById('is_penalty_delay_family_heavy_container',this.checked)">
    <label class="form-check-label" for="is_penalty_delay_family_heavy">{{__('attributes.penalty_delay_family_heavy')}}</label>
</div>
<div class="col-12 my-2 hidden" id="is_penalty_delay_family_heavy_container">
<div class="d-flex align-items-center">
    <label class="form_label text-uppercase">{{__('attributes.penalty_delay_family_heavy')}}</label>
    <div class="mx-2">
        <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" data-trigger="focus" data-content="{{__('placeholders.penalty_delay_family_heavy')}}" title="{{__('attributes.penalty_delay_family_heavy')}}">
            <i class="far fa-question-circle"></i>
        </button>
    </div>
</div>
    <textarea placeholder="{{__('placeholders.penalty_delay_family_heavy')}}" name="penalty_delay_family_heavy" class="form-control" type="text" rows=5></textarea>

    <div class="col-12">
        <label class="form_label">{{__('attributes.attach_documents')}} ({{__('attributes.penalty_delay_family_heavy')}})</label>
        <input type="file" class="form-control" name="attachements_penalty_delay_family_heavy[]" multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rtf,text/plain,application/pdf" />
    </div>
</div>