<h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.note')}}</span></h4>

<div class="col-12">
    <form method="POST" action="{{route('users.update.user.note')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$current->id ?? ''}}">
        <textarea class="mb-2 form-control editor_textarea" name="note" rows=20>{{$user->note->note ?? ''}}</textarea>
        <div class="float-right my-3">
            <button type="submit" class="btn btn-primary fas fa-plus btn-lg"></button>
        </div>
    </form>
</div>