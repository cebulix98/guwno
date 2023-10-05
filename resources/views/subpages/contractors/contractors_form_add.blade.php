@extends('layouts.app')
@section('title') {{__('titles.title_contractors')}} @endsection
@section('content')

<div class="col-12 row m-0 p-0 align-items-center">

    <div class="p-3 my-3">

        <form id="form_contractors_add" method="POST" action="{{route('contractors.add')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-12 row p-0 m-0">
                <div class="col-12 mb-2">
                    @foreach($contractor_types as $type)
                    <div class="form-check form-check-inline">
                        <input class="contractor_type form-check-input" name="contractor_type" type="radio" id="contractor_type_{{$type->id}}" value="{{$type->id}}" @if($type->id==2) checked @endif onchange="ContractorsModalAddSwitchContractor(this.value)">
                        <label class="form-check-label text-uppercase" name="contractor_type" for="contractor_type_{{$type->id}}">{{$type->name}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="contractor_switch_2 contractor_switch col-12">
                    @include('subpages/contractors/modal/contractors_modal_gus')
                </div>

                <div class="w-100">
                    <h4 class="section-title text-left"><span class=" ml-3">{{ __('headlines.invoice_data') }}</span></h4>

                    <div class="col-12 row p-0 m-0">
                        <div class="col-md-4 contractor_switch_2 contractor_switch">
                            <label class="required text-uppercase">{{__('attributes.nip')}}</label>
                            <input required placeholder="{{__('attributes.nip')}}" name="nip" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text">
                        </div>

                        <div class="col-md-4 contractor_switch_2 contractor_switch">
                            <label class="text-uppercase">{{__('attributes.regon')}}</label>
                            <input placeholder="{{__('attributes.regon')}}" name="regon" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text">
                        </div>

                        <div class="col-md-4 contractor_switch_2 contractor_switch">
                            <label class="text-uppercase">{{__('attributes.krs')}}</label>
                            <input placeholder="{{__('attributes.krs')}}" name="krs" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text">
                        </div>

                        <div class="col-md-4 contractor_switch_2 contractor_switch">
                            <label class="required text-uppercase">{{__('attributes.fullname')}}</label>
                            <input required placeholder="{{__('attributes.fullname')}}" name="fullname" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text" onchange="GetShortname(this.value)">
                        </div>

                        <div class="col-md-4 contractor_switch_2 contractor_switch">
                            <label class="required text-uppercase">{{__('attributes.shortname')}}</label>
                            <input required placeholder="{{__('attributes.shortname')}}" name="shortname" class="input_contractor_switch contractor_type_2 mb-2 form-control" type="text">
                        </div>

                        <div class="col-md-4 contractor_switch_1 contractor_switch">
                            <label class="required text-uppercase">{{__('attributes.firstname')}}</label>
                            <input required placeholder="{{__('attributes.firstname')}}" name="firstname" class="input_contractor_switch contractor_type_1 mb-2 form-control" type="text">
                        </div>

                        <div class="col-md-4 contractor_switch_1 contractor_switch">
                            <label class="required text-uppercase">{{__('attributes.lastname')}}</label>
                            <input required placeholder="{{__('attributes.lastname')}}" name="lastname" class="input_contractor_switch contractor_type_1 mb-2 form-control" type="text">
                        </div>

                        <div class="col-md-4">
                            <label class="text-uppercase">{{__('attributes.street')}}</label>
                            <input placeholder="{{__('attributes.street')}}" name="street" class="mb-2 form-control" type="text">
                        </div>

                        <div class="col-md-4">
                            <label class="text-uppercase">{{__('attributes.city')}}</label>
                            <input placeholder="{{__('attributes.city')}}" name="city" class="mb-2 form-control" type="text">
                        </div>

                        <div class="col-md-4">
                            <label class="text-uppercase">{{__('attributes.postal_code')}}</label>
                            <input placeholder="{{__('attributes.postal_code')}}" name="postal_code" class="mb-2 form-control" type="text">
                        </div>
                    </div>
                </div>

                <div class="w-100">
                    <h4 class="section-title text-left"><span class=" ml-3">{{ __('headlines.contact_data') }}</span></h4>
                    <div class="col-12 row p-0 m-0">
                        <div class="col-12 p-0 m-0">
                            <h4>{{__('messages.tip_input_add_separated')}}</h4>
                            <div class="col-12 row p-0 m-0 mt-2 mb-2">
                                @foreach($contact_types as $type)
                                <div class="col-md-4">
                                    <label class="text-uppercase">{{$type->name}}</label>
                                    <textarea class="form-control" name="type_{{$type->id}}" rows=1></textarea>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @foreach($agreements as $aggr)
            <div class="ml-3 pt-1 mb-1 mt-1 form-check">
                <input type="checkbox" class="form-check-input" name="agreements[]" value="{{$aggr->id}}" id="agreement{{$aggr->id}}" @if($aggr->is_required) required @endif>
                <label class="form-check-label @if($aggr->is_required) required @endif" for="agreement{{$aggr->id}}">{{$aggr->name}}</label>
            </div>
            @endforeach

            <input type="submit" form="form_contractors_add" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.next')}}">
        </form>
    </div>
</div>

@endsection

<script src="{{ mix('/js/subpages/contractors/contractors.js') }}" defer></script>
<script src="{{ mix('/js/subpages/contractors/contractors_modal_add.js') }}" defer></script>
<script src="{{ mix('/js/subpages/contractors/contractors_modal_details.js') }}" defer></script>
<script src="{{ mix('/js/subpages/contractors/contractors_modal_contacts.js') }}" defer></script>