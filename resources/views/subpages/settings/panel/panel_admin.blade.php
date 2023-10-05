<h4 class="section-title text-left"><span class=" ml-3">{{ __('headlines.panel_administrator') }}</span></h4>
<div class="col-12 row justify-content-center align-items-center h-100 m-0">
    <div class="text-center col-12 col-md-3 p-2">
        <a class="tile-outer" href="{{ route('admin.cases') }}">
            <div class="tile-inner">
                <span class="icon-text text-center  tile-text mb-3 mt-3">{{ __('cases') }}</span>
            </div>
        </a>
    </div>

    @if(Auth::user()->IsPermitted('mdictionaries','can_read'))
    <div class="text-center col-12 col-md-3 p-2">
        <a class="tile-outer" href="{{ route('admin.dictionary') }}">
            <div class="tile-inner">
                <span class="icon-text text-center  tile-text mb-3 mt-3">{{ __('dictionaries') }}</span>
            </div>
        </a>
    </div>
    @endif

    @if(Auth::user()->IsPermitted('mmotions','can_read'))
    <div class="text-center col-12 col-md-3 p-2">
        <a class="tile-outer" href="{{ route('admin.motions') }}">
            <div class="tile-inner">
                <span class="icon-text text-center  tile-text mb-3 mt-3">{{ __('motions') }}</span>
            </div>
        </a>
    </div>
    @endif

    @if(Auth::user()->IsPermitted('mmotions','can_read'))
    <div class="text-center col-12 col-md-3 p-2">
        <a class="tile-outer" href="{{ route('admin.motions.prices') }}">
            <div class="tile-inner">
                <span class="icon-text text-center  tile-text mb-3 mt-3">{{ __('prices') }}</span>
            </div>
        </a>
    </div>
    @endif

    @if(Auth::user()->IsPermitted('musers','can_read'))
    <div class="text-center col-12 col-md-3 p-2">
        <a class="tile-outer" href="{{ route('admin.users') }}">
            <div class="tile-inner">
                <span class="icon-text text-center  tile-text mb-3 mt-3">{{ __('users') }}</span>
            </div>
        </a>
    </div>
    @endif

    @if(Auth::user()->IsPermitted('madmin','can_read'))
    <div class="text-center col-12 col-md-3 p-2">
        <a class="tile-outer" href="{{ route('system.smtp') }}">
            <div class="tile-inner">
                <span class="icon-text text-center  tile-text mb-3 mt-3">{{ __('smtp') }}</span>
            </div>
        </a>
    </div>
    @endif

    @if(Auth::user()->IsPermitted('madmin','can_read'))
    <div class="text-center col-12 col-md-3 p-2">
        <a class="tile-outer" href="{{ route('stats.lawyers') }}">
            <div class="tile-inner">
                <span class="icon-text text-center  tile-text mb-3 mt-3">{{ __('stats.lawyers') }}</span>
            </div>
        </a>
    </div>
    @endif

</div>