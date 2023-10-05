<tr class="@if($model->id==$current_id) background-table-body-dark @endif">
    <td >{{$model->id}}</td>
    <td >{{$model->name}}</td>
    <td >
        <!-- @if($model->id!=$current_id)
        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="{{route('admin.motions.expanded',['id'=>$model->id])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.open')}}">
            <i class="fas fa-eye"></i>
        </a>
        @endif
        @if($model->id==$current_id)
        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="{{route('admin.motions')}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.close')}}">
            <i class="fas fa-eye-slash"></i>
        </a>
        @endif -->
        <a class="collapse-arrow-toggle collapse-trigger btn btn-primary btn-lg" href="{{route('motions.form.id',['id'=>$model->id])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.move')}}">
            <i class="fas fa-arrow-right"></i>
        </a>
        @if($model && $model->settings && $model->settings->custom_link)
        <a class="collapse-arrow-toggle collapse-trigger btn btn-secondary btn-lg" href="{{route('motions.form.origin.code',['code'=>$model->settings->custom_link])}}" data-toggle="tooltip" data-html="true" title="{{__('tooltips.move')}}">
            <i class="fas fa-arrow-right"></i>
        </a>
        @endif
    </td>
</tr>