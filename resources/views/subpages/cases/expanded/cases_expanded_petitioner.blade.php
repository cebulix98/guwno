<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.petitioner')}}</span></h4>

<table class="table table-sm table-borderless">
    <tr>
        <th>{{ __('table_heads.firstandlastname') }}</th>
        <td>
            {{$current->petitioner->firstname ?? ''}} {{$current->petitioner->lastname ?? ''}}
        </td>
        <td>
            <button class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg float-right"  data-target="#collapse_update_case_person_name_{{$current->id}}" aria-controls="#collapse_update_case_person_name_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </td>
    </tr>
    <tr class="collapse" id="collapse_update_case_person_name_{{$current->id}}">
        <th></th>
        <td>
            <form method="POST" action="{{route('cases.update.case.person.name')}}">
                @csrf
                <input type="hidden" name="id" value="{{$current->id}}">
                <div class="w-100 row align-items-end">
                    <div class="col">
                        <label class="required text-uppercase">{{__('attributes.firstname')}}</label>
                        <input required placeholder="{{$current->petitioner->firstname ?? ''}}" name="firstname" class="form-control" type="text" value="{{$current->petitioner->firstname ?? ''}}" maxlength=255>
                    </div>
                    <div class="col">
                        <label class="required text-uppercase">{{__('attributes.lastname')}}</label>
                        <input required placeholder="{{$current->petitioner->lastname ?? ''}}" name="lastname" class="form-control" type="text" value="{{$current->petitioner->lastname ?? ''}}" maxlength=255>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary fas fa-save btn-lg"></button>
                    </div>
                </div>
            </form>
        </td>
        <td></td>
    </tr>
    <tr>
        <th>{{ __('table_heads.phone') }}</th>
        <td>
            {{$current->petitioner->phone ?? ''}}
        </td>
        <td>
            <button class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg float-right"  data-target="#collapse_update_case_person_phone_{{$current->id}}" aria-controls="#collapse_update_case_person_phone_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </td>
    </tr>
    <tr class="collapse" id="collapse_update_case_person_phone_{{$current->id}}">
        <th></th>
        <td>
            <form method="POST" action="{{route('cases.update.case.person.phone')}}">
                @csrf
                <input type="hidden" name="id" value="{{$current->id}}">
                <div class="w-100 row align-items-end">
                    <div class="col">
                        <input required placeholder="{{$current->petitioner->phone ?? ''}}" name="phone" class="form-control" type="text" value="{{$current->petitioner->phone ?? ''}}" maxlength=255>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary fas fa-save btn-lg"></button>
                    </div>
                </div>
            </form>
        </td>
        <td></td>
    </tr>
    <tr>
        <th>{{ __('table_heads.email') }}</th>
        <td>
            {{$current->petitioner->email ?? ''}}
        </td>
        <td>
            <button class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg float-right"  data-target="#collapse_update_case_person_email_{{$current->id}}" aria-controls="#collapse_update_case_person_email_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </td>
    </tr>
    <tr class="collapse" id="collapse_update_case_person_email_{{$current->id}}">
        <th></th>
        <td>
            <form method="POST" action="{{route('cases.update.case.person.email')}}">
                @csrf
                <input type="hidden" name="id" value="{{$current->id}}">
                <div class="w-100 row align-items-end">
                    <div class="col">
                        <input required placeholder="{{$current->petitioner->email ?? ''}}" name="email" class="form-control" type="email" value="{{$current->petitioner->email ?? ''}}" maxlength=255>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary fas fa-save btn-lg"></button>
                    </div>
                </div>
            </form>
        </td>
        <td></td>
    </tr>
</table>