<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.is_convict_woman_child')}}</th>
            <td>
                @if(isset($parameters->attributes['is_convict_woman_child']) && $parameters->attributes['is_convict_woman_child']==1)
                {{__('labels.yes')}}
                @elseif(isset($parameters->attributes['is_convict_woman_child']) && $parameters->attributes['is_convict_woman_child']==-1)
                {{__('labels.no')}}
                @else
                {{__('labels.na')}}
                @endif
            </td>
        </tr>
    </table>
</div>

<h4><b>{{__('headlines.penalty_delay')}}</b></h4>

<div class="col-12 p-0 m-0 row">
    <table class="table">
        <tr>
            <th>{{__('attributes.penalty_delay_family_heavy')}}</th>
            <td>{{isset($parameters->attributes['penalty_delay_family_heavy']) ? $parameters->attributes['penalty_delay_family_heavy'] : ''}}</td>
        </tr>
    </table>
</div>