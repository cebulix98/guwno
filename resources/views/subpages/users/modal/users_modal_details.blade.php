<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="users_modal_details">
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
                        <form id="form_users_details" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 row">
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" form="users_modal_details" readonly class="form-control-plaintext green" name="message_success" value="">
                <input type="submit" form="users_modal_details" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.save')}}">
                <button type="button" class="btn btn-secondary btn-lg text-uppercase" data-dismiss="modal">{{__('buttons.close')}}</button>
            </div>
        </div>
    </div>
</div>