<div class="col-12">
    <table class="table table-sm table-borderless">
        <tr>
            <th>{{ __('table_heads.firstname') }}</th>
            <td>
                {{$current->firstname ?? ''}}
            </td>
            <td>
                <button class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg float-right"  data-target="#collapse_update_firstname_{{$current->id}}" aria-controls="#collapse_update_firstname_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </td>
        </tr>
        <tr class="collapse" id="collapse_update_firstname_{{$current->id}}">
            <th></th>
            <td>
                <form method="POST" action="{{route('users.update.user.firstname')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$current->id}}">
                    <div class="w-100 row align-items-end">
                        <div class="col">
                            <label class="required text-uppercase">{{__('attributes.firstname')}}</label>
                            <input required placeholder="{{$current->firstname ?? ''}}" name="firstname" class="form-control" type="text" value="{{$current->firstname ?? ''}}" maxlength=255>
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
            <th>{{ __('table_heads.lastname') }}</th>
            <td>
                {{$current->lastname ?? ''}}
            </td>
            <td>
                <button class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg float-right"  data-target="#collapse_update_lastname_{{$current->id}}" aria-controls="#collapse_update_lastname_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </td>
        </tr>
        <tr class="collapse" id="collapse_update_lastname_{{$current->id}}">
            <th></th>
            <td>
                <form method="POST" action="{{route('users.update.user.lastname')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$current->id}}">
                    <div class="w-100 row align-items-end">
                        <div class="col">
                            <label class="required text-uppercase">{{__('attributes.lastname')}}</label>
                            <input required placeholder="{{$current->lastname ?? ''}}" name="lastname" class="form-control" type="text" value="{{$current->lastname ?? ''}}" maxlength=255>
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
                {{$current->phone ?? ''}}
            </td>
            <td>
                <button class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg float-right"  data-target="#collapse_update_phone_{{$current->id}}" aria-controls="#collapse_update_phone_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </td>
        </tr>
        <tr class="collapse" id="collapse_update_phone_{{$current->id}}">
            <th></th>
            <td>
                <form method="POST" action="{{route('users.update.user.phone')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$current->id}}">
                    <div class="w-100 row align-items-end">
                        <div class="col">
                            <label class="required text-uppercase">{{__('attributes.phone')}}</label>
                            <input required placeholder="{{$current->phone ?? ''}}" name="phone" class="form-control" type="text" value="{{$current->phone ?? ''}}" maxlength=255>
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
            <th>{{ __('table_heads.role') }}</th>
            <td>
                {{$model->role->name ?? ''}}
            </td>
            @if(Auth::user()->IsPermitted('madmin','can_edit'))
            <td>
                @if(!$model->IsSuperAdmin())
                <button  class="btn btn-primary btn-lg" data-title="{{__('modals.title_update_user_role')}}" data-id="{{$model->id}}" data-role="{{$model->role_id}}" data-toggle="modal" data-target="#users_modal_role" onclick="ShowModal(this, UsersModalRole)">
                    <i class="fas fa-pencil-alt"></i>
                </button>
                @endif
            </td>
            @endif
        </tr>
    </table>
</div>