<div class="col-12">

    <!-- <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.other_attachements')}}</span></h4> -->

    <div class="row w-100">
        <form id="form_add_attachements" action="{{ route('cases.manage.add.attachement') }}" class="w-100" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$current->id}}">
            <div class="col-12">
                <label>{{__('attributes.attachements')}}</label>
                <input required type="file" class="form-control" name="files[]" multiple />
            </div>
            <div class="col-12 row">
                <div class="my-2 ml-auto">
                    <input type="submit" class="btn btn-primary float-right text-uppercase" value="{{__('buttons.save')}}">
                </div>
            </div>
        </form>

        <div class="col-12">
            <div class="col-12 mb-2 mt-2">
                <table class="table table-sm">
                    <tr>
                        <th>{{__('table_heads.name')}}</th>
                        <th>{{__('table_heads.created_at')}}</th>
                        <th>{{__('table_heads.description')}}</th>
                        <th>{{__('table_heads.options')}}</th>
                    </tr>
                    @foreach($current->attachements as $file)
                    <tr>
                        <td><a href="{{route('file.download',['id'=>$file->file_id])}}">{{$file->file->name ?? ''}}</a></td>
                        <td>{{$file->created_at}}</td>
                        <td>{{$file->description}}</td>
                        <td>
                            <form action="{{ route('cases.manage.remove.attachement') }}" method="POST" onsubmit="DeleteElement()">
                                @csrf
                                <input type="hidden" name="id" value="{{$file->id}}">
                                <div class="col-12 row">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
</div>