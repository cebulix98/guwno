<!-- Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="dictionaries_modal_section_toggle_categories">
    <div class="modal-dialog modal-dialog-center modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title "></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-body-div col-md-12">
                        <form id="form_section_toggle_categories" method="POST" action="{{ route('admin.dictionary.manage.section.toggle.categories') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id">

                            @if($categories)
                            <div class="col-12 row">
                                @foreach($categories as $category)
                                <div class="col-md-3 custom-control custom-switch">
                                    <input id="form_section_toggle_categories_item_category_{{$category->id}}" type="checkbox" class="custom-control-input" name="categories[]" value="{{$category->id}}">
                                    <label class="custom-control-label" for="form_section_toggle_categories_item_category_{{$category->id}}">{{$category->name}}</label>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" form="form_section_toggle_categories" readonly class="form-control-plaintext green" name="message_success" value="">
                <input type="submit" form="form_section_toggle_categories" class="btn btn-primary m-1 btn-lg " value="{{__('buttons.save')}}">
                <button type="button" class="btn btn-secondary btn-lg " data-dismiss="modal">{{__('buttons.close')}}</button>
            </div>
        </div>
    </div>
</div>