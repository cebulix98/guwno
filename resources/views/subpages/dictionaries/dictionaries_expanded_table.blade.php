@if($model->HasAttributeName('id'))
<td>
    {{$word->id ?? ''}}
</td>
@endif

@if($model->HasAttributeName('name'))
<td>
    {{$word->name ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_name{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_name{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_name{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.name') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required placeholder="{{__('attributes.name')}}" name="name" class="form-control" type="text" value="{{$word->name}}">
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('order'))
<td>
    {{$word->order ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_order{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_order{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_order{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.order') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required placeholder="{{__('attributes.order')}}" name="order" class="form-control" type="number" value="{{$word->order}}" min=0>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('description'))
<td>
    {{$word->description ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_description{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_description{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_description{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.description') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required placeholder="{{__('attributes.description')}}" name="description" class="form-control" type="text" value="{{$word->description}}">
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('path'))
<td>
    {{$word->path ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_path{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_path{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_path{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.path') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required placeholder="{{__('attributes.path')}}" name="path" class="form-control" type="text" value="{{$word->path}}">
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('icon_filename'))
<td>
    {{$word->icon_filename ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_icon_filename{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_icon_filename{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_icon_filename{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.icon_filename') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required placeholder="{{__('attributes.icon_filename')}}" name="icon_filename" class="form-control" type="text" value="{{$word->icon_filename}}">
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('filename'))
<td>
    {{$word->filename ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_filename{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_filename{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_filename{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.filename') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required placeholder="{{__('attributes.filename')}}" name="filename" class="form-control" type="text" value="{{$word->filename}}">
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('section_id'))
<td>
    {{$word->section->name ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_section{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_section{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_section{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.section') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <select required name="section_id" class="form-control">
                    @foreach ($model->GetForeignKeyOptions('section_id') as $section)
                    <option value="{{ $section->id }}" @if($section->id == $word->section_id) selected @endif >{{ $section->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('category_id'))
<td>
    {{$word->category->name ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_category{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_category{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_category{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.category') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <select required name="category_id" class="form-control">
                    @foreach ($model->GetForeignKeyOptions('category_id') as $category)
                    <option value="{{ $category->id }}" @if($category->id == $word->category_id) selected @endif >{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('type_id'))
<td>
    {{$word->type->name ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_type_id{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_type_id{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_type_id{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.type') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <select required name="type_id" class="form-control">
                    @foreach ($model->GetForeignKeyOptions('type_id') as $category)
                    <option value="{{ $category->id }}" @if($category->id == $word->type_id) selected @endif >{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('tag_id'))
<td>
    {{$word->tag->name ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_tag{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_tag{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_tag{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.tag') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <select required name="tag_id" class="form-control">
                    @foreach ($model->GetForeignKeyOptions('tag_id') as $tag)
                    <option value="{{ $tag->id }}" @if($tag->id == $word->tag_id) selected @endif >{{ $tag->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('color'))
<td>
    {{$word->color ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_color{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_color{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_color{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.color') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required placeholder="{{__('attributes.color')}}" name="color" class="form-control" type="text" value="{{$word->color}}" min=0>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('agreement_id'))
<td>
    {{$word->agreement->name ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_agreement_id{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_agreement_id{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_agreement_id{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.agreement') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <select required name="agreement_id" class="form-control">
                    @foreach ($model->GetForeignKeyOptions('agreement_id') as $category)
                    <option value="{{ $category->id }}" @if($category->id == $word->agreement_id) selected @endif >{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('is_required'))
<td>
    <div class="collapse show" id="collapse_expand_update_is_required{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.is_required') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <button type="submit" class="btn btn-link btn-lg">
                    @if($word->is_required)
                    <i class="far fa-check-circle green"></i>
                    @else
                    <i class="fas fa-times red"></i>
                    @endif
                </button>
            </div>
        </form>
    </div>
</td>
@endif

@if($model->HasAttributeName('module_id'))
<td>
    {{$word->module->name ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_module{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_module{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_module{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.module') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <select required name="module_id" class="form-control">
                    @foreach ($model->GetForeignKeyOptions('module_id') as $module)
                    <option value="{{ $module->id }}" @if($module->id == $word->module_id) selected @endif >{{ $module->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('icon'))
<td>
    {{$word->icon ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_icon{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_icon{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_icon{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.upload.icon') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required type="file" accept='.jpg, .jpeg, .png' class="form-control" name="icons[]" />
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('url'))
<td>
    {{$word->url ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_url{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_url{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_url{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.url') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <input required placeholder="{{__('attributes.url')}}" name="url" class="form-control" type="text" value="{{$word->url}}" min=0>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

@if($model->HasAttributeName('smtp_id'))
<td>
    {{$word->smtp->from_email ?? ''}}

    @if($word->CanBeEdited() && $model->is_editable)
    <button class="collapse-arrow-toggle collapse-trigger btn btn-primary float-right btn-lg" data-target="#collapse_expand_update_smtp_id{{$model->id}}_{{$word->id}}" aria-controls="#collapse_expand_update_smtp_id{{$model->id}}_{{$word->id}}" aria-expanded="false"  data-toggle="collapse">
        <i class="fas fa-pencil-alt"></i>
    </button>
    @endif

    @if($word->CanBeEdited() && $model->is_editable)
    <div class="collapse" id="collapse_expand_update_smtp_id{{$model->id}}_{{$word->id}}">
        <form action="{{ route('admin.dictionary.update.smtp') }}" method="POST">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <div class="input-group">
                <select required name="smtp_id" class="form-control">
                    @foreach ($model->GetForeignKeyOptions('smtp_id') as $smtp)
                    <option value="{{ $smtp->id }}" @if($smtp->id == $word->smtp_id) selected @endif >{{ $smtp->from_email }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i></button>
            </div>
        </form>
    </div>
    @endif
</td>
@endif

<td class="text-right">
    @if($word->CanBeRemoved() && $model->is_editable)
    <div>
        <form action="{{ route('admin.dictionary.manage.remove') }}" method="POST" onsubmit="return DeleteElement()">
            @csrf
            <input type="hidden" name="dictionary_id" value="{{$model->id}}">
            <input type="hidden" name="id" value="{{$word->id}}">
            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-trash-alt"></i></button>
        </form>
    </div>
    @endif
</td>