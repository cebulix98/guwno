<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="contractors_modal_add">
    <div class="modal-dialog modal-dialog-center modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-body-div col-md-12">
                        <form id="form_contractors_add" method="POST" action="{{route('admin.contractors.add')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 row">
                                <div class="col-md-12 mb-2">
                                    @foreach($contractor_types as $type)
                                    <div class="form-check form-check-inline">
                                        <input class="contractor_type form-check-input" name="contractor_type" type="radio" id="contractor_type_{{$type->id}}" value="{{$type->id}}" @if($type->id==2) checked @endif onchange="ContractorsModalAddSwitchContractor(this.value)">
                                        <label class="form-check-label text-uppercase" name="contractor_type" for="contractor_type_{{$type->id}}">{{$type->name}}</label>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="contractor_switch_2 contractor_switch col-md-12">
                                    @include('subpages/contractors/modal/contractors_modal_gus')
                                </div>

                                <div class="col-md-4 contractor_switch_2 contractor_switch">
                                    <label class="required text-uppercase">{{__('attributes.nip')}}</label>
                                    <input required placeholder="{{__('attributes.nip')}}" name="nip" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text">
                                </div>

                                <div class="col-md-4 contractor_switch_2 contractor_switch">
                                    <label class="text-uppercase">{{__('attributes.regon')}}</label>
                                    <input placeholder="{{__('attributes.regon')}}" name="regon" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text">
                                </div>

                                <div class="col-md-4 contractor_switch_2 contractor_switch">
                                    <label class="text-uppercase">{{__('attributes.krs')}}</label>
                                    <input placeholder="{{__('attributes.krs')}}" name="krs" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text">
                                </div>

                                <div class="col-md-4 contractor_switch_2 contractor_switch">
                                    <label class="required text-uppercase">{{__('attributes.fullname')}}</label>
                                    <input required placeholder="{{__('attributes.fullname')}}" name="fullname" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text" onchange="GetShortname(this.value)">
                                </div>

                                <div class="col-md-4 contractor_switch_2 contractor_switch">
                                    <label class="required text-uppercase">{{__('attributes.shortname')}}</label>
                                    <input required placeholder="{{__('attributes.shortname')}}" name="shortname" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text">
                                </div>

                                <div class="col-md-4 contractor_switch_1 contractor_switch">
                                    <label class="required text-uppercase">{{__('attributes.firstname')}}</label>
                                    <input required placeholder="{{__('attributes.firstname')}}" name="firstname" class="input_contractor_switch contractor_type_1 mb-2 form-control" type="text">
                                </div>

                                <div class="col-md-4 contractor_switch_1 contractor_switch">
                                    <label class="required text-uppercase">{{__('attributes.lastname')}}</label>
                                    <input required placeholder="{{__('attributes.lastname')}}" name="lastname" class="input_contractor_switch contractor_type_1 mb-2 form-control" type="text">
                                </div>

                                <div class="col-md-4">
                                    <label class="text-uppercase">{{__('attributes.street')}}</label>
                                    <input placeholder="{{__('attributes.street')}}" name="street" class="mb-2 form-control" type="text">
                                </div>

                                <div class="col-md-4">
                                    <label class="text-uppercase">{{__('attributes.city')}}</label>
                                    <input placeholder="{{__('attributes.city')}}" name="city" class="mb-2 form-control" type="text">
                                </div>

                                <div class="col-md-4">
                                    <label class="text-uppercase">{{__('attributes.postal_code')}}</label>
                                    <input placeholder="{{__('attributes.postal_code')}}" name="postal_code" class="mb-2 form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="text-uppercase">{{__('attributes.note')}}</label>
                                <textarea class="mb-2 form-control" name="note" rows=3></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" form="form_contractors_add" readonly class="form-control-plaintext green" name="message_success" value="">
                <input type="submit" form="form_contractors_add" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.next')}}">
                <button type="button" class="btn btn-secondary btn-lg text-uppercase" data-dismiss="modal">{{__('buttons.close')}}</button>
            </div>
        </div>
    </div>
</div>