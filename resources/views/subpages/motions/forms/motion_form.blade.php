@extends('layouts.guest')
@section('title') {{__('titles.title_motions')}} @endsection
@section('content')

<div class="col-12 m-0 p-0 mb-3">

    @if($motion)
    <form id="form_cases_add" method="POST" action="{{route('motion.cases.add')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="motion_id" value="{{$motion_id ?? ''}}">
        <input type="hidden" name="origin" value="{{$origin_id ?? ''}}">

        @include('subpages/motions/forms/motion_form_'.$motion_id)

        <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.documents')}}</span></h4>

        <div class="col-12 my-2">
            <label class="form_label">{{__('attributes.attach_documents')}}</label>
            <input type="file" class="form-control" name="attachements_all[]" multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rtf,text/plain,application/pdf" />
        </div>

        <div class="col-12">
            @foreach($motion->agreements as $aggr)
            <div class="ml-3 pt-1 mb-1 mt-1 form-check">
                <input type="checkbox" class="form-check-input" name="agreements[]" value="{{$aggr->id}}" id="agreement{{$aggr->id}}" @if($aggr->is_required) required @endif>
                <label class="form-check-label @if($aggr->is_required) required @endif" for="agreement{{$aggr->id}}">{!!$aggr->agreement->description ?? ''!!}</label>
            </div>
            @endforeach
        </div>

        <div class="col-12 mb-3 pb-3 text-right mt-1">
            <input type="submit" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.next')}}">
        </div>
        <br class="clearBoth" />

        @include('subpages/motions/forms/motion_form_price')
    </form>
    @endif
</div>
@endsection

<script src="{{ mix('/js/subpages/motions/motions.js') }}" defer></script>