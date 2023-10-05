<div class="w-100">
    <div class="col-12 row">
        @if(!$current->date_started)
        <div class="px-2">
            <button form="form_start_{{$current->id}}" type="submit" class="btn btn-success btn-lg ">{{__('buttons.start')}}
        </div>
        @else
        <div class="px-2">
            <button form="form_complete_{{$current->id}}" type="submit" class="btn btn-success btn-lg text-uppercase">{{__('buttons.complete')}}
        </div>
        @endif
        <div class="px-2"><a class="btn btn-lg btn-primary text-uppercase" href="{{route('file.download',['id'=>$current->case_motion->original_rtf_id])}}">{{__('buttons.download_motion_original')}}</a></div>
        @if($current->case_motion && $current->case_motion->rtf)
        <div class="px-2"><a class="btn btn-lg btn-primary text-uppercase" href="{{route('file.download',['id'=>$current->case_motion->rtf_id])}}">{{__('buttons.download_motion_newest')}}</a></div>
        @endif
    </div>
    <form id="form_start_{{$current->id}}" method="POST" action="{{route('cases.update.case.start')}}" class="hidden">
        @csrf
        <input type="hidden" name="id" value="{{$current->id}}">
    </form>
    <form id="form_complete_{{$current->id}}" method="POST" action="{{route('cases.update.case.complete')}}" class="hidden">
        @csrf
        <input type="hidden" name="id" value="{{$current->id}}">
    </form>

</div>