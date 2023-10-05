@extends('layouts.app')
@section('title') {{__('titles.title_welcome')}} @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="col-12 row m-0 p-0 align-items-center mt-3 pt-3 h-100">
                <div class="col-12 row justify-content-center align-items-center h-100">
                    <div class="text-center col-md-3 p-2">
                        <a class="tile-outer" href="{{ route('login') }}">
                            <div class="tile-inner">
                                <span class="icon-text text-center text-uppercase tile-text mb-3 mt-3">{{ __('Login') }}</span>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="text-center col-md-3 p-2">
                        <a class="tile-outer" href="{{ route('register') }}">
                            <div class="tile-inner">
                                <span class="icon-text text-center text-uppercase tile-text mb-3 mt-3">{{ __('Register') }}</span>
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection