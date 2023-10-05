<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="users_modal_add">
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
                        <form id="form_users_add" method="POST" action="{{ route('admin.users.add') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12 row">
                                <div class="col-md-4">
                                    <label class="required text-uppercase">{{__('attributes.firstname')}}</label>
                                    <input required placeholder="{{__('attributes.firstname')}}" name="firstname" class="mb-2 form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label class="required text-uppercase">{{__('attributes.lastname')}}</label>
                                    <input required placeholder="{{__('attributes.lastname')}}" name="lastname" class="mb-2 form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label class="required text-uppercase">{{__('attributes.email')}}</label>
                                    <input required placeholder="{{__('attributes.email')}}" name="email" class="mb-2 form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label class="text-uppercase">{{__('attributes.phone')}}</label>
                                    <input placeholder="{{__('attributes.phone')}}" name="phone" class="mb-2 form-control" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label class="required text-uppercase">{{__('attributes.role')}}</label>
                                    <select required name="role" class="form-control">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" form="form_users_add" readonly class="form-control-plaintext green" name="message_success" value="">
                <input type="submit" form="form_users_add" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.save')}}">
                <button type="button" class="btn btn-secondary btn-lg text-uppercase" data-dismiss="modal">{{__('buttons.close')}}</button>
            </div>
        </div>
    </div>
</div>