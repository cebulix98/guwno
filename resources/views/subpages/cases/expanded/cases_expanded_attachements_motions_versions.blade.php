<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.motion_other_versions')}}</span></h4>

<button class="collapse-arrow-toggle collapse-trigger btn btn-primary"  data-target="#collapse_motion_versions_{{$current->id}}" aria-controls="#collapse_motion_versions_{{$current->id}}" aria-expanded="false" data-toggle="collapse">
    <i class="fas fa-pencil-alt"></i> <span>{{__('buttons.show')}}</span> <i class="fas fa-chevron-down fa-angle-up"></i>
</button>

<div class="collapse col-12" id="collapse_motion_versions_{{$current->id}}">
    <table class="table table-sm">
        <tr>
            <th>{{__('table_heads.version')}}</th>
            <th>{{__('table_heads.created_at')}}</th>
            <th>{{__('table_heads.options')}}</th>
        </tr>

        @foreach($current->case_motion_versions as $version)
        @if(!$version->is_primary)
        <tr>
            <td>{{$version->version ?? ''}}</a></td>
            <td>{{$version->created_at}}</td>
            <td>
                <a href="{{route('file.download',['id'=>$version->file_id ?? ''])}}"><i class="far fa-file-alt"></i> {{__('buttons.download')}}</a>
            </td>
        </tr>
        @endif
        @endforeach
    </table>
</div>