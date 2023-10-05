<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_smtp_create">
    <div class="modal-dialog modal-dialog-center modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-body-div col-md-12">
                        <form id="form_smtp_create" method="POST" action="{{ route('system.smtp.add') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 row">
                                <div class="col-md-4">
                                    <label>{{__('attributes.host')}}</label>
                                    <input required placeholder="{{__('attributes.host')}}" name="host" class="mb-2 form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label>{{__('attributes.port')}}</label>
                                    <input required placeholder="{{__('attributes.port')}}" name="port" class="mb-2 form-control" type="text" value=587>
                                </div>
                                <div class="col-md-4">
                                    <label>{{__('attributes.username')}}</label>
                                    <input required placeholder="{{__('attributes.username')}}" name="username" class="mb-2 form-control" type="email">
                                </div>
                                <div class="col-md-4">
                                    <label>{{__('attributes.password')}}</label>
                                    <input required placeholder="{{__('attributes.password')}}" name="password" class="mb-2 form-control" type="PASSWORD">
                                </div>
                                <div class="col-md-4">
                                    <label>{{__('attributes.encryption')}}</label>
                                    <select required name="encryption" class="form-control">
                                        <option value=0>brak</option>
                                        <option value="STARTTLS">STARTTLS</option>
                                        <option value="TLS">TLS</option>
                                        <option value="SSL">SSL</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>{{__('attributes.from_email')}}</label>
                                    <input required placeholder="{{__('attributes.from_email')}}" name="from_email" class="mb-2 form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label>{{__('attributes.from_name')}}</label>
                                    <input required placeholder="{{__('attributes.from_name')}}" name="from_name" class="mb-2 form-control" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" form="form_smtp_create" readonly class="form-control-plaintext green" name="message_success" value="">
                <input type="submit" form="form_smtp_create" class="btn btn-primary m-1" value="{{__('buttons.save')}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('buttons.close')}}</button>
            </div>
        </div>
    </div>
</div>