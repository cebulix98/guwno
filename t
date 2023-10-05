 <tr>
            <th>{{ __('table_heads.lastname') }}</th>
            <td>
                {{$current->lastname ?? ''}}
            </td>
            <td>
                <button class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg float-right" type="button" data-target="#collapse_update_lastname_{{$current->id}}" aria-controls="#collapse_update_lastname_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
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