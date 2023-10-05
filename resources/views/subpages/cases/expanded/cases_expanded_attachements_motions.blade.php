<div class="col-12">
    <div class="col-12 mb-2 mt-2">
        <table class="table table-sm">
            <tr>
                <th>{{$current->case_motion->GetName() ?? ''}}</th>
                <th>{{__('table_heads.name')}}</th>
                <th>{{__('table_heads.created_at')}}</th>
                <th>{{__('table_heads.options')}}</th>
            </tr>


            <tr>
                <td>{{__('headlines.original_form_motion')}}</td>
                <td>{{$current->case_motion->original_rtf->name ?? ''}}</td>
                <td>{{$current->case_motion->original_rtf->created_at ?? ''}}</td>
                <td>
                    @if($current->case_motion->original_rtf)
                    <a href="{{route('file.download',['id'=>$current->case_motion->original_rtf_id ?? ''])}}"><i class="far fa-file-alt"></i> RTF</a>
                    @endif
                    @if($current->case_motion->original_pdf)
                    <a href="{{route('file.download',['id'=>$current->case_motion->original_pdf_id ?? ''])}}"><i class="fas fa-file-pdf"></i> PDF</a>
                    @endif
                    @if($current->case_motion->original_txt)
                    <a href="{{route('file.download',['id'=>$current->case_motion->original_txt_id ?? ''])}}"><i class="fas fa-file"></i> TXT</a>
                    @endif
                </td>
            </tr>

            <tr>
                <td>{{__('headlines.motion_newest')}}</td>
                <td>{{$current->case_motion->rtf->name ?? ''}}</td>
                <td>{{$current->case_motion->rtf->created_at ?? ''}}</td>
                <td>
                    @if($current->case_motion->rtf)
                    <a href="{{route('file.download',['id'=>$current->case_motion->rtf_id ?? ''])}}"><i class="far fa-file-alt"></i> RTF</a>
                    @endif

                    @if($current->case_motion->pdf)
                    <a href="{{route('file.download',['id'=>$current->case_motion->pdf_id ?? ''])}}"><i class="fas fa-file-pdf"></i> PDF</a>
                    @endif

                    @if($current->case_motion->txt)
                    <a href="{{route('file.download',['id'=>$current->case_motion->txt_id ?? ''])}}"><i class="far fa-file"></i> TXT</a>
                    @endif

                    @if($current->case_motion->rtf)
                    <button  class="btn btn-success mx-2" data-id="{{$current->id}}" data-title="{{__('modals.title_quick_response')}}" data-toggle="modal" data-target="#cases_modal_quick_response" onclick="ShowModal(this, CasesModalQuickResponse)">
                        {{__('buttons.quick_response')}}
                    </button>
                    @endif


                </td>
            </tr>
            <tr>
                <td colspan=4>
                    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary"  data-target="#collapse_upload_motion_rtf_{{$current->id}}" aria-controls="#collapse_upload_motion_rtf_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                        <i class="fas fa-pencil-alt"></i>
                        @if($current->case_motion->rtf)
                        <span>{{__('headlines.swap_motion_rtf')}}</span>
                        @else
                        <span>{{__('headlines.upload_motion_rtf')}}</span>
                        @endif
                        <i class="fas fa-chevron-down fa-angle-up"></i>
                    </button>
                    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary"  data-target="#collapse_upload_motion_pdf_{{$current->id}}" aria-controls="#collapse_upload_motion_pdf_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                        <i class="fas fa-pencil-alt"></i>
                        @if($current->case_motion->pdf)
                        <span>{{__('headlines.swap_motion_pdf')}}</span>
                        @else
                        <span>{{__('headlines.upload_motion_pdf')}}</span>
                        @endif
                        <i class="fas fa-chevron-down fa-angle-up"></i>
                    </button>
                    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary"  data-target="#collapse_upload_motion_txt_{{$current->id}}" aria-controls="#collapse_upload_motion_txt_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                        <i class="fas fa-pencil-alt"></i>
                        @if($current->case_motion->txt)
                        <span>{{__('headlines.swap_motion_txt')}}</span>
                        @else
                        <span>{{__('headlines.upload_motion_txt')}}</span>
                        @endif
                        <i class="fas fa-chevron-down fa-angle-up"></i>
                    </button>
                </td>
            </tr>
        </table>

        <div class="collapse col-md-12" id="collapse_upload_motion_rtf_{{$current->id}}">
            <form id="form_update_rtf" action="{{ route('cases.manage.swap.motion.rtf') }}" class="w-100" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$current->id}}">
                <div class="col-12">
                    <label>{{__('attributes.rtf')}}</label>
                    <input required type="file" class="form-control" name="files[]" accept=".rtf" />
                </div>
                <div class="col-12 row">
                    <div class="my-2 ml-auto">
                        <input type="submit" class="btn btn-primary float-right text-uppercase" value="{{__('buttons.save')}}">
                    </div>
                </div>
            </form>
        </div>

        <div class="collapse col-md-12" id="collapse_upload_motion_pdf_{{$current->id}}">
            <form id="form_update_pdf" action="{{ route('cases.manage.swap.motion.pdf') }}" class="w-100" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$current->id}}">
                <div class="col-12">
                    <label>{{__('attributes.pdf')}}</label>
                    <input required type="file" class="form-control" name="files[]" accept=".pdf" />
                </div>
                <div class="col-12 row">
                    <div class="my-2 ml-auto">
                        <input type="submit" class="btn btn-primary float-right text-uppercase" value="{{__('buttons.save')}}">
                    </div>
                </div>
            </form>
        </div>

        <div class="collapse col-md-12" id="collapse_upload_motion_txt_{{$current->id}}">
            <form id="form_update_txt" action="{{ route('cases.manage.swap.motion.txt') }}" class="w-100" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$current->id}}">
                <div class="col-12">
                    <label>{{__('attributes.txt')}}</label>
                    <input required type="file" class="form-control" name="files[]" accept=".txt" />
                </div>
                <div class="col-12 row">
                    <div class="my-2 ml-auto">
                        <input type="submit" class="btn btn-primary float-right text-uppercase" value="{{__('buttons.save')}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>