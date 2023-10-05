@if($current)
<div class="col-12 p-0 m-0">
    <div class="w-100" id="section_menu">

    </div>

    <div class="" id="section_info">
        <h4 class="section-title text-left"><span class=" ml-3">{{ __('headlines.invoice_data') }}</span></h4>
        <table class="table table-sm table-borderless">
            @if($current->type_id == 1)
            <tr>
                <th>{{ __('table_heads.firstandlastname') }}</th>
                <td>{{$current->firstname}} {{$current->lastname}}</td>
            </tr>
            @endif

            @if($current->type_id == 2)
            <tr>
                <th>{{ __('table_heads.name') }}</th>
                <td>{{$current->fullname}}</td>
            </tr>

            <tr>
                <th>{{ __('table_heads.shortname') }}</th>
                <td>{{$current->shortname}}</td>
            </tr>

            <tr>
                <th>{{ __('table_heads.nip') }}</th>
                <td>{{$current->nip}}</td>
            </tr>

            <tr>
                <th>{{ __('table_heads.regon') }}</th>
                <td>{{$current->regon}}</td>
            </tr>
            @endif

            <tr>
                <th>{{ __('table_heads.address') }}</th>
                <td>{{$current->postal_code}} {{$current->city}} {{$current->street}}</td>
            </tr>

        </table>
    </div>

    <div class="col-12 row p-0 m-0">

        <div class="col-md-6">

            <div class="" id="section_contacts">
                <h4 class="section-title text-left"><span class=" ml-3">{{ __('headlines.contacts') }}</span></h4>

                <button class="collapse-arrow-toggle collapse-trigger btn btn-primary m-1"  data-target="#collapse_form_contractors_contacts_add_new_contact" aria-controls="#collapse_form_contractors_contacts_add_new_contact" aria-expanded="false" data-toggle="collapse">
                    <i class="fas fa-pencil-alt"></i> <span class="text-uppercase ml-3">{{__('headlines.new_contact')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
                </button>

                <form id="form_contractors_contacts_add" method="POST" action="{{route('contractors.manage.add.contact')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$current->id}}">
                    <input type="hidden" name="address_id">

                    <div class="col-12 p-0 m-0 collapse" id="collapse_form_contractors_contacts_add_new_contact">
                        <h4>{{__('messages.tip_input_add_separated')}}</h4>
                        <div class="col-12 row p-0 m-0 mt-2 mb-2">
                            @foreach($contact_types as $type)
                            <div class="col-md-4">
                                <label class="text-uppercase">{{$type->name}}</label>
                                <textarea class="form-control" name="type_{{$type->id}}" rows=1></textarea>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-12 row mt-2 mb-2">
                            <div class="col-12 custom-control custom-switch">
                                <input id="included_contact_person" type="checkbox" class="custom-control-input" name="included_contact_person" value="1" onchange="ToggleAppendContactPerson(!this.checked, 'form_contractors_contacts_add')">
                                <label class="custom-control-label" for="included_contact_person">{{__('labels.included_contact_person')}}</label>
                            </div>
                            <div class="contact_person_switch">
                                <select disabled name="contact_person_id" class="form-control contact_person_input contact_person_select" onchange="SwitchContactPerson(this.value, 'form_contractors_contacts_add')">
                                    <option value=0>{{__('labels.new_person')}}</option>
                                    @foreach($current->employees as $person)
                                    <option value='{{$person->id}}'>{{$person->lastname}} {{$person->firstname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="contact_person_switch">
                                <input disabled placeholder="{{__('attributes.firstname')}}" name="firstname" class="form-control contact_person_input" type="text">
                            </div>
                            <div class="contact_person_switch">
                                <input disabled placeholder="{{__('attributes.lastname')}}" name="lastname" class="form-control contact_person_input" type="text">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.save')}}">
                    </div>
                </form>

                @foreach($current->contacts as $contact)
                <span class="p-2">
                    {!! $contact->type->icon ?? '' !!}

                    {{$contact->data}} @if($contact->employee)({{$contact->employee->lastname}} {{$contact->employee->firstname}})@endif
                </span>

                @endforeach
            </div>


            <div class="" id="section_employees">
                <h4 class="section-title text-left"><span class=" ml-3">{{ __('headlines.contact_people') }}</span></h4>
                <table class="table table-sm">
                    @foreach($current->employees as $person)
                    <tr>
                        <th>{{$person->lastname}} {{$person->firstname}}</th>
                    </tr>
                    <tr>
                        <td>
                            @foreach($person->contacts as $contact)
                            <span class="p-2">
                                {!! $contact->type->icon ?? '' !!}

                                {{$contact->data}}
                            </span>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>

        <div class="col-md-6">

            <div class="" id="section_addresses">
                <h4 class="section-title text-left"><span class=" ml-3">{{ __('headlines.addresses') }}</span></h4>

                <div class="my-2">
                    <div>
                        <form method="POST" action="{{route('contractors.manage.add.address')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$current->id}}">
                            <div class="col-md-12 row align-items-end p-0 m-0">
                                <div class="input-group col-md-12 row align-items-end p-0 m-0">
                                    <div class="">
                                        <label class="text-uppercase">{{__('attributes.street')}}</label>
                                        <input required placeholder="{{__('attributes.street')}}" name="street" class="form-control" type="text">
                                    </div>

                                    <div class="">
                                        <label class="text-uppercase">{{__('attributes.city')}}</label>
                                        <input required placeholder="{{__('attributes.city')}}" name="city" class="form-control" type="text">
                                    </div>

                                    <div class="">
                                        <label class="text-uppercase">{{__('attributes.postal_code')}}</label>
                                        <input required placeholder="{{__('attributes.postal_code')}}" name="postal_code" class="form-control" type="text">
                                    </div>
                                    <div class="flex-fill">
                                        <label class="text-uppercase">{{__('attributes.note')}}</label>
                                        <textarea class="form-control" name="note" rows=1></textarea>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-primary fas fa-plus btn-lg"></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-sm">
                    @foreach($current->addresses as $address)
                    <tr>
                        <th>{{$address->postal_code}} {{$address->city}} {{$address->street}}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            @foreach($address->contacts as $contact)
                            <span class="p-2">
                                {!! $contact->type->icon ?? '' !!}

                                {{$contact->data}} @if($contact->employee)({{$contact->employee->lastname}} {{$contact->employee->firstname}})@endif
                            </span>
                            @endforeach
                        </td>
                        <td>
                            <button  class="btn btn-primary float-right btn-lg" data-title="{{__('modals.title_add_contact')}}" data-model_contacts="{{$current->contacts->load('employee')}}" data-address_contacts="{{$address->contacts}}" data-id="{{$current->id}}" data-address_id="{{$address->id}}" data-employees="{{$current->employees}}" data-toggle="modal" data-target="#contractors_modal_contacts" onclick="ShowModal(this, ContractorsModalContacts)">
                                <i class="fas fa-cog"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>



    </div>

    <div class="col-12 p-0 m-0">
        <h4>{{__('headlines.my_item_cards')}}</h4>

        <div class="my-2">
            <form method="POST" action="{{route('items.update.item.contractor')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="contractor_id" value="{{$current->id}}">

                <div class="col-12 p-0 m-0">
                    <div class="mb-2 input-group">
                        <select required name="id" class="form-control col-md-6">
                            @foreach($items as $item)
                            <option value='{{$item->id}}'>{{$item->name}}</option>
                            @endforeach
                        </select>
                        <input type="submit" class="btn btn-primary m-1 btn-lg text-uppercase" value="{{__('buttons.assign')}}">
                    </div>

                </div>
            </form>
        </div>


        <div class="my-2">
            <table class="table table-sm">
                <tr>
                    <th >{{__('table_heads.name')}}</th>
                    <th >{{ __('table_heads.section') }}</th>
                    <th ></th>
                </tr>
                @foreach($current->items as $item)
                <tr>
                    <td >{{$item->name ?? ''}}</td>
                    <td >{{$item->section->section->name ?? ''}}</td>
                    <td >
                        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{route('items.expanded',['id'=>$item->id])}}">
                            <i class="fas fa-cog"></i>
                        </a>

                        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg"  href="{{ route('items.global.single',['id'=>$item->id, 'section'=>$item->section_id, 'category'=>null]) }}">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>

</div>
@endif