<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.convict_family')}}</span></h4>

<div class="col-12 p-0 m-0 row">
    <div class="col-12 my-2">
        <div class="d-flex align-items-center">
            <label class="form_label required text-uppercase">{{__('attributes.convict_behaviour')}}</label>
            <div class="mx-2">
                <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" data-content="{{__('placeholders.convict_behaviour')}}" title="{{__('attributes.convict_behaviour')}}" data-trigger="focus">
                    <i class="far fa-question-circle"></i>
                </button>
            </div>
        </div>
        <textarea required placeholder="{{__('placeholders.convict_behaviour')}}" name="convict_behaviour" class="form-control" type="text" rows=3></textarea>
    </div>

    <div class="col-12 my-2">
        <div class="d-flex align-items-center">
            <label class="form_label required text-uppercase">{{__('attributes.convict_employment')}}</label>
            <div class="mx-2">
                <button type="button" class="btn btn-link btn-lg" data-toggle="popover" data-html="true" title="{{__('attributes.convict_employment')}}" data-content="{{__('placeholders.convict_employment')}}" data-trigger="focus">
                    <i class="far fa-question-circle"></i>
                </button>
            </div>
        </div>
        <textarea required placeholder="{{__('placeholders.convict_employment')}}" name="convict_employment" class="form-control" type="text" rows=3></textarea>

        <div class="col-12">
            <label class="form_label">{{__('attributes.attach_documents')}} ({{__('attributes.convict_employment')}})</label>
            <input type="file" class="form-control" name="attachements_convict_employment[]" multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rtf,text/plain,application/pdf" />
        </div>
    </div>
</div>