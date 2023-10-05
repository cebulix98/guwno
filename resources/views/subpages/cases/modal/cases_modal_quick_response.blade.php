<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="cases_modal_quick_response">
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
                        <form id="form_cases_quick_response" method="POST" action="{{route('cases.add.response.quick')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="col-md-12 row">
                                <div class="col-md-12">
                                    <label class="required">{{__('attributes.content')}}</label>
                                    <textarea class="mb-2 form-control editor_textarea" name="content" rows=20></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" form="form_cases_quick_response" readonly class="form-control-plaintext green" name="message_success" value="">
                <input type="submit" form="form_cases_quick_response" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.send')}}">
                <button class="btn btn-secondary btn-lg text-uppercase" data-dismiss="modal">{{__('buttons.close')}}</button>
            </div>
        </div>
    </div>
</div>