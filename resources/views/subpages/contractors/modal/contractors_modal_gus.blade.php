<div class="col-md-12 col-12 m-0 p-0 row justify-content-end">
    <div class="input-group col-12 m-0 p-0 justify-content-end">
        <div class="pb-0 mb-0 flex-fill">
            <input placeholder="{{__('labels.gus_search')}}" name="gus_keyword" class="mb-2 form-control" type="text">
        </div>
        <div class="pb-0 mb-0 flex-fill flex-sm-grow-0">
            <select name="gus_type" class="form-control text-uppercase">
                <option value="nip" selected>{{__('attributes.nip')}}</option>
                <option value="regon">{{__('attributes.regon')}}</option>
                <option value="krs">{{__('attributes.krs')}}</option>
            </select>
        </div>
        <div>
            <button class="btn btn-primary text-uppercase" onclick="AjaxReadGusData(event, 'form_contractors_add')">{{__('buttons.gus')}}</button>
        </div>
    </div>
    <input type="text" readonly class="form-control-plaintext red text-right" name="message_gus" value="">
</div>