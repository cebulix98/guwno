<div class="w-100 py-3">
    <form method="POST" action="{{route('cases.add.response')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$current->id ?? ''}}">
        <div class="col-12 my-3">
            <label class="required text-uppercase">{{__('attributes.response')}}</label>
            <textarea class="mb-2 form-control editor_textarea" name="content" rows=3></textarea>
        </div>
        <div class="col-12 my-3">
            <label class="required text-uppercase">{{__('attributes.footer')}}</label>
            <textarea readonly class="mb-2 form-control" name="footer" rows=3>
            {{Auth::user()->firstname}} {{Auth::user()->lastname}}
            {!!$system_response_footer->content ?? '' !!}
            </textarea>
        </div>

        <hr class="w-100" />

        <div class="col-12 my-3">

            <h4>{{__('attributes.attachements')}}</h4>

            @if($current->case_motion->original_pdf_id)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="response_form_pdf" id="response_form_pdf" value="{{$current->case_motion->original_pdf_id ?? ''}}">
                <label class="form-check-label" for="response_form_pdf">{{__('headlines.original_form_motion')}} (pdf)</label>
            </div>
            @endif

            @if($current->case_motion->original_rtf_id)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="response_form_rtf" id="response_form_rtf" value="{{$current->case_motion->original_rtf_id ?? ''}}">
                <label class="form-check-label" for="response_form_rtf">{{__('headlines.original_form_motion')}} (rtf)</label>
            </div>
            @endif

            @if($current->case_motion->pdf_id)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="response_motion_pdf" id="response_motion_pdf" value="{{$current->case_motion->pdf_id ?? ''}}">
                <label class="form-check-label" for="response_motion_pdf">{{__('headlines.motion_newest')}} (pdf)</label>
            </div>
            @endif

            @if($current->case_motion->rtf_id)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="response_motion_rtf" id="response_motion_rtf" value="{{$current->case_motion->rtf_id ?? ''}}">
                <label class="form-check-label" for="response_motion_rtf">{{__('headlines.motion_newest')}} (rtf)</label>
            </div>
            @endif

            @foreach($current->attachements as $file)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="attachements[]" id="response_attachement{{$file->file_id}}" value="{{$file->file_id}}">
                <label class="form-check-label" for="response_attachement{{$file->file_id}}">{{$file->file->name ?? ''}}</label>
            </div>
            @endforeach

            <div class="col-12 my-3">
                <input required type="file" class="form-control" name="files[]" multiple />
            </div>
        </div>

        <div class="float-right my-3">
            <button type="submit" class="btn btn-primary btn-lg">{{__('buttons.send')}}</button>
        </div>
    </form>
</div>

<table class="table table-sm my-3">
    <tr>
        <th>{{__('table_heads.created_at')}}</th>
        <th>{{__('table_heads.user')}}</th>
        <th>{{__('table_heads.date')}}</th>
        <th>{{__('table_heads.options')}}</th>
    </tr>

    @foreach($current->responses as $response)
    <tr>
        <td>{{$response->created_at}}</td>
        <td>{{$response->user->name ?? ''}}</td>
        <td>{{$response->date_sent ?? __('labels.not_sent')}}</td>
        <td>
            <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="{{route($route_expanded_responses,['id'=>$current->id, 'response_id'=>$response->id])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.open')}}">
                <i class="fas fa-eye"></i>
            </a>
            @if($response->id==$response_id)
            <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="{{route($route_expanded_responses,['id'=>$current->id, 'response_id'=>0])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.close')}}">
                <i class="fas fa-eye-slash"></i>
            </a>
            @endif
        </td>
    </tr>
    @if($response->id==$response_id)
    <tr>
        <td colspan=3>
            <div class="w-100 my-3">
                {!!$response->content!!}
            </div>

            @foreach($response->file_attachements as $file)
            <a href="{{route('file.download',['id'=>$file->id])}}">{{$file->name ?? ''}}</a>
            @endforeach
        </td>
    </tr>
    @endif
    @endforeach
</table>