   <!-- add new word -->
   @if($model->is_editable)
   <tr>
       @if($model->HasAttributeName('id'))
       <td></td>
       @endif
       @if($model->HasAttributeName('name'))
       <td>
           <input required placeholder="{{__('attributes.name')}}" form="form_word_add{{$model->id}}" name="name" class="form-control" type="text">
       </td>
       @endif
       @if($model->HasAttributeName('order'))
       <td>
           <input placeholder="{{__('attributes.order')}}" form="form_word_add{{$model->id}}" name="order" class="form-control" type="number" min=0>
       </td>
       @endif
       @if($model->HasAttributeName('description'))
       <td>
           <input placeholder="{{__('attributes.description')}}" form="form_word_add{{$model->id}}" name="description" class="form-control" type="text">
       </td>
       @endif
       @if($model->HasAttributeName('path'))
       <td>
           <input required placeholder="{{__('attributes.path')}}" form="form_word_add{{$model->id}}" name="path" class="form-control" type="text">
       </td>
       @endif
       @if($model->HasAttributeName('icon_filename'))
       <td>
           <input required placeholder="{{__('attributes.icon_filename')}}" form="form_word_add{{$model->id}}" name="icon_filename" class="form-control" type="text">
       </td>
       @endif
       @if($model->HasAttributeName('filename'))
       <td>
           <input required placeholder="{{__('attributes.filename')}}" form="form_word_add{{$model->id}}" name="filename" class="form-control" type="text">
       </td>
       @endif
       @if($model->HasAttributeName('section_id'))
       <td>
           <select required name="section_id" class="form-control" form="form_word_add{{$model->id}}">
               @foreach ($model->GetForeignKeyOptions('section_id') as $section)
               <option value="{{ $section->id }}">{{ $section->name }}</option>
               @endforeach
           </select>
       </td>
       @endif
       @if($model->HasAttributeName('category_id'))
       <td>
           <select required name="category_id" class="form-control" form="form_word_add{{$model->id}}">
               @foreach ($model->GetForeignKeyOptions('category_id') as $category)
               <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
           </select>
       </td>
       @endif
       @if($model->HasAttributeName('type_id'))
       <td>
           <select required name="type_id" class="form-control" form="form_word_add{{$model->id}}">
               @foreach ($model->GetForeignKeyOptions('type_id') as $type)
               <option value="{{ $type->id }}">{{ $type->name }}</option>
               @endforeach
           </select>
       </td>
       @endif
       @if($model->HasAttributeName('tag_id'))
       <td>
           <select required name="tag_id" class="form-control" form="form_word_add{{$model->id}}">
               @foreach ($model->GetForeignKeyOptions('tag_id') as $tag)
               <option value="{{ $tag->id }}">{{ $tag->name }}</option>
               @endforeach
           </select>
       </td>
       @endif
       @if($model->HasAttributeName('color'))
       <td>
           <input required placeholder="{{__('attributes.color')}}" form="form_word_add{{$model->id}}" name="color" class="form-control" type="text">
       </td>
       @endif
       @if($model->HasAttributeName('agreement_id'))
       <td>
           <select required name="agreement_id" class="form-control" form="form_word_add{{$model->id}}">
               @foreach ($model->GetForeignKeyOptions('agreement_id') as $agreement)
               <option value="{{ $agreement->id }}">{{ $agreement->name }}</option>
               @endforeach
           </select>
       </td>
       @endif
       @if($model->HasAttributeName('is_required'))
       <td>
           <div class="form-check">
               <input type="checkbox" class="form-check-input" form="form_word_add{{$model->id}}" name="is_required" value="1" checked>
           </div>
       </td>
       @endif
       @if($model->HasAttributeName('module_id'))
       <td>
           <select required name="module_id" class="form-control" form="form_word_add{{$model->id}}">
               @foreach ($model->GetForeignKeyOptions('module_id') as $module)
               <option value="{{ $module->id }}">{{ $module->name }}</option>
               @endforeach
           </select>
       </td>
       @endif
       @if($model->HasAttributeName('icon'))
       <td>
           <input placeholder="{{__('attributes.icon')}}" form="form_word_add{{$model->id}}" name="icon" class="form-control" type="text">
       </td>
       @endif
       @if($model->HasAttributeName('url'))
       <td>
           <input required placeholder="{{__('attributes.url')}}" form="form_word_add{{$model->id}}" name="url" class="form-control" type="text">
       </td>
       @endif
       @if($model->HasAttributeName('smtp_id'))
       <td>
           <select name="smtp_id" class="form-control" form="form_word_add{{$model->id}}">
               @foreach ($model->GetForeignKeyOptions('smtp_id') as $smtp)
               <option value="{{ $smtp->id }}">{{ $smtp->from_email }}</option>
               @endforeach
           </select>
       </td>
       @endif
       <td>
           <button type="submit" class="btn btn-primary btn-lg" form="form_word_add{{$model->id}}"><i class="fas fa-plus"></i></button>
           <form id="form_word_add{{$model->id}}" action="{{ route('admin.dictionary.add') }}" method="POST" style="display: none;" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="id" value="{{$model->id}}">
           </form>
       </td>
   </tr>
   @endif