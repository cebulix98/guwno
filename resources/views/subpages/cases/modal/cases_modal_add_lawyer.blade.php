<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="cases_modal_add_lawyer">
    <div class="modal-dialog modal-dialog-center modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase"></h5>
                <button  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-body-div col-md-12">
                        <form id="form_case_add_lawyer" method="POST" action="{{route('cases.manage.add.lawyer')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="col-md-12 row">
                                <div class="col-md-12">
                                    <label class="required">{{__('attributes.lawyer')}}</label>
                                    <input placeholder="{{__('labels.search')}}" name="lawyer_search" class="mb-2 form-control" type="text" onkeyup="FindLawyer('form_case_add_lawyer')">
                                    <select required name="lawyer_id" class="form-control text-uppercase">
                                        @foreach ($lawyers as $lawyer)
                                        <option value="{{ $lawyer->id }}">{{ $lawyer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" form="form_case_add_lawyer" readonly class="form-control-plaintext green" name="message_success" value="">
                <input type="submit" form="form_case_add_lawyer" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.save')}}">
                <button  class="btn btn-secondary btn-lg text-uppercase" data-dismiss="modal">{{__('buttons.close')}}</button>
            </div>
        </div>
    </div>
</div>