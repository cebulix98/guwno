<div class="col-12 row text-right justify-content-start">
    <a href="{{route($route_expanded_fields,['id'=>$current->id, 'field_id'=>0])}}#collapse_fields_{{$current->id}}" class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1 btn-lg" data-target="#collapse_fields_{{$current->id}}" aria-controls="#collapse_fields_{{$current->id}}">
        <i class="fas fa-pencil-alt"></i> <span class=" ml-3">{{__('headlines.tab_fields')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
    </a>
    <a href="{{route($route_expanded_lawyers,['id'=>$current->id, 'lawyer_id'=>0])}}#collapse_lawyers_{{$current->id}}" class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1 btn-lg" data-target="#collapse_lawyers_{{$current->id}}" aria-controls="#collapse_lawyers_{{$current->id}}">
        <i class="fas fa-pencil-alt"></i> <span class=" ml-3">{{__('headlines.lawyers')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
    </a>
    <a href="{{route($route_expanded_motions,['id'=>$current->id, 'tab_motion_id'=>0])}}#collapse_motions_{{$current->id}}" class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1 btn-lg" data-target="#collapse_motions_{{$current->id}}" aria-controls="#collapse_motions_{{$current->id}}">
        <i class="fas fa-pencil-alt"></i> <span class=" ml-3">{{__('headlines.motions')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
    </a>
    <a href="{{route($route_expanded_attachements,['id'=>$current->id, 'attachement_id'=>0])}}#collapse_attachements_{{$current->id}}" class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1 btn-lg" data-target="#collapse_attachements_{{$current->id}}" aria-controls="#collapse_attachements_{{$current->id}}">
        <i class="fas fa-pencil-alt"></i> <span class=" ml-3">{{__('headlines.attachements')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
    </a>
    <a href="{{route($route_expanded_responses,['id'=>$current->id, 'response_id'=>0])}}#collapse_responses_{{$current->id}}" class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1 btn-lg" data-target="#collapse_responses_{{$current->id}}" aria-controls="#collapse_responses_{{$current->id}}">
        <i class="fas fa-pencil-alt"></i> <span class=" ml-3">{{__('headlines.responses')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
    </a>
    <a href="{{route($route_expanded_notes,['id'=>$current->id, 'note_id'=>0])}}#collapse_notes_{{$current->id}}" class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1 btn-lg" data-target="#collapse_notes_{{$current->id}}" aria-controls="#collapse_notes_{{$current->id}}">
        <i class="fas fa-pencil-alt"></i> <span class=" ml-3">{{__('headlines.notes')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
    </a>
    <a href="{{route($route_expanded_history,['id'=>$current->id, 'history_id'=>0])}}#collapse_history_{{$current->id}}" class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1 btn-lg" data-target="#collapse_history_{{$current->id}}" aria-controls="#collapse_history_{{$current->id}}">
        <i class="fas fa-pencil-alt"></i> <span class=" ml-3">{{__('headlines.history')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
    </a>



</div>

<div class="col-12">
    <div class="collapse col-12 section @if($field_id!=null) show @endif" id="collapse_fields_{{$current->id}}">
        <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.tab_fields')}}</span></h4>
        @include('subpages/cases/expanded/cases_expanded_fields')
    </div>
    <div class="collapse col-12 section @if($lawyer_id!=null) show @endif" id="collapse_lawyers_{{$current->id}}">
        <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.lawyers')}}</span></h4>
        @include('subpages/cases/expanded/cases_expanded_lawyers')
    </div>

    <div class="collapse col-12 @if($tab_motion_id!=null) show @endif" id="collapse_motions_{{$current->id}}">
        <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.motions')}}</span></h4>
        @include('subpages/cases/expanded/cases_expanded_motions')
    </div>

    <div class="collapse col-12 @if($attachement_id!=null) show @endif" id="collapse_attachements_{{$current->id}}">
        <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.attachements')}}</span></h4>
        @include('subpages/cases/expanded/cases_expanded_attachements')
    </div>

    <div class="collapse col-12 @if($response_id!=null) show @endif" id="collapse_responses_{{$current->id}}">
        <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.responses')}}</span></h4>
        @include('subpages/cases/expanded/cases_expanded_responses')
    </div>

    <div class="collapse col-12 @if($note_id!=null) show @endif" id="collapse_notes_{{$current->id}}">
        <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.notes')}}</span></h4>
        @include('subpages/cases/expanded/cases_expanded_notes')
    </div>

    <div class="collapse col-12 @if($history_id!=null) show @endif" id="collapse_history_{{$current->id}}">
        <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.history')}}</span></h4>
        @include('subpages/cases/expanded/cases_expanded_history')
    </div>
</div>