<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="facebook-domain-verification" content="zxnfgwo57vavdaqpevhlq55y4jkjaz" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <title>@yield('title')</title>
    
    @include('layouts/head')
  
</head>

<body>
    <div id="app" class="min-h-screen flex flex-col h-screen">
        @include('layouts/navbar')

        <main class="py-4 flex-grow">
            <div class="container-fluid m-0 p-0 h-100">
                <div class="container">

                    <div class="flash-message">
                        <p id="global_js_alert" class="alert alert-info hidden"><span id="js_alert_info"></span><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    </div>

                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{!! Session::get('alert-' . $msg) !!} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                        @endforeach
                    </div> <!-- end .flash-message -->
                </div>
                <div class="container h-100">
                    <div class="row justify-content-center h-100">
                        <div class="col-12 h-100 p-0 m-0">
                            <div class="card h-100">
                                <div class="card-body p-1 p-md-3 h-100">
                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('layouts/footer')
</body>
<script>
    $(document).ready(function() {
        InitializeTinymce();
        initializeTooltip();
        initializePopover();
        InitializeSimpleTinymce();
    });
</script>
@yield('scripts')

</html>