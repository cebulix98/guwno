<div class="col-12 p-0 m-0">
    <div class="col-12 m-0 p-0 align-items-center mt-3 pt-3 h-100">

        @if(Auth::user()->IsPermitted('madmin','can_read'))
        <div class="col-12 p-0 m-0 my-3">
            @include('subpages/settings/panel/panel_admin')
        </div>
        @endif

        <div class="col-12 p-0 m-0 my-3">
            @include('subpages/settings/panel/panel_user')
        </div>
    </div>
</div>