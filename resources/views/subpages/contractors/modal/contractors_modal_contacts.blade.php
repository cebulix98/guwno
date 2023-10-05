<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="contractors_modal_contacts">
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
                        <form id="form_contractors_contacts" method="POST" action="{{route('contractors.manage.add.contact')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id">
                            <input type="hidden" name="address_id">

                            <button class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1" type="button" data-target="#collapse_form_contractors_contacts_new_contact" aria-controls="#collapse_form_contractors_contacts_new_contact" aria-expanded="false" data-toggle="collapse">
                                <i class="fas fa-pencil-alt"></i> <span class="text-uppercase ml-3">{{__('headlines.new_contact')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
                            </button>

                            <div class="col-md-12 collapse mt-2 mb-2" id="collapse_form_contractors_contacts_new_contact">
                                <h4>{{__('messages.tip_input_add_separated')}}</h4>
                                <div class="col-md-12 row mt-2 mb-2">
                                    @foreach($contact_types as $type)
                                    <div class="col-md-4">
                                        <label class="text-uppercase">{{$type->name}}</label>
                                        <textarea class="form-control" name="type_{{$type->id}}" rows=1></textarea>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-12 row mt-2 mb-2">
                                    <div class="col-md-3 custom-control custom-switch">
                                        <input id="included_contact_person" type="checkbox" class="custom-control-input" name="included_contact_person" value="1" onchange="ToggleAppendContactPerson(!this.checked)">
                                        <label class="custom-control-label" for="included_contact_person">{{__('labels.included_contact_person')}}</label>
                                    </div>
                                    <div class="contact_person_switch">
                                        <select name="contact_person_id" class="form-control contact_person_input contact_person_select" onchange="SwitchContactPerson(this.value)">
                                            <option value=0>{{__('labels.new_person')}}</option>
                                        </select>
                                    </div>
                                    <div class="contact_person_switch">
                                        <input required placeholder="{{__('attributes.firstname')}}" name="firstname" class="form-control contact_person_input" type="text">
                                    </div>
                                    <div class="contact_person_switch">
                                        <input required placeholder="{{__('attributes.lastname')}}" name="lastname" class="form-control contact_person_input" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3 class="section-title text-left"><span class="text-uppercase ml-3">{{__('headlines.contacts')}}</span></h3>

                                <div class="hidden sample">
                                    <div class="hidden sample_checkbox_contact" id="sample_checkbox_contact" data-type="checkbox" data-class="custom-control-input" data-id="contractor_contact_" data-label="custom-control-label" data-name="contacts[]" data-parent_type="div" data-parent_class="col-md-3 custom-control custom-switch"></div>
                                </div>

                                <div class="col-md-12 row contractor_contacts_body" id="contractor_contacts_body">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" form="form_contractors_contacts" readonly class="form-control-plaintext green" name="message_success" value="">
                <input type="submit" form="form_contractors_contacts" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.save')}}">
                <button type="button" class="btn btn-secondary btn-lg text-uppercase" data-dismiss="modal">{{__('buttons.close')}}</button>
            </div>
        </div>
    </div>
</div>