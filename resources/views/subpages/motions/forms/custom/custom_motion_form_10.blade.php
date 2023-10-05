@extends('layouts.guest_full')
@section('title') {{__('titles.title_motions')}} @endsection
@section('content')

<div class="col-12 m-0 p-0 mb-3">

    <form id="form_cases_add" method="POST" action="{{route('motion.cases.add')}}" enctype="multipart/form-data" class="form-semi-transparent">
        @csrf
        <input type="hidden" name="motion_id" value="{{$motion_id ?? ''}}">
        <input type="hidden" name="origin" value="{{$origin_id ?? ''}}">

        <div class="col-12 p-0 m-0 row">
            <div class="col-md-6 col-6 my-2">
                <label class="required  form_label">{{__('attributes.firstname')}}</label>
                <input required name="firstname" class="form-control" type="text">
            </div>
            <div class="col-md-6 col-6 my-2">
                <label class="required  form_label">{{__('attributes.lastname')}}</label>
                <input required name="lastname" class="form-control" type="text">
            </div>

            <div class="col-md-6 col-6 my-2">
                <label class="required  form_label">{{__('attributes.email')}}</label>
                <input required name="email" class="form-control" type="email">
            </div>
            <div class="col-md-6 col-6 my-2">
                <label class="required  form_label">{{__('attributes.phone')}}</label>
                <input required name="phone" class="form-control" type="text">
            </div>
            <div class="col-md-12 my-2">
                <label class="required  form_label">{{__('attributes.content_title')}}</label>
                <input required name="content_title" class="form-control" type="text">
            </div>
            <div class="col-md-12 my-2">
                <label class="required  form_label">{{__('attributes.content')}}</label>
                <textarea required name="content" class="form-control" type="text" rows=3></textarea>
            </div>
        </div>

        <div class="col-12 p-0 m-0 mb-3">
            @foreach($motion->agreements as $aggr)
            <div class="ml-3 pt-1 mb-1 mt-1 form-check read-more-container">
                <input type="checkbox" class="form-check-input" name="agreements[]" value="{{$aggr->id}}" id="agreement{{$aggr->id}}" @if($aggr->is_required) required @endif>
                <label class="form-check-label read-more collapse @if($aggr->is_required) required @endif" for="agreement{{$aggr->id}}" id="label_agreement{{$aggr->id}}">{!!$aggr->agreement->description ?? ''!!}</label>
                <a role="button" class="collapsed text-white" data-toggle="collapse" href="#label_agreement{{$aggr->id}}" aria-expanded="false" aria-controls="label_agreement{{$aggr->id}}"></a>
            </div>
            @endforeach
        </div>

        <div class="col-12 mt-1 text-center">
            <button type="submit" class="btn btn-form-primary mx-1 btn-lg w-100 text-uppercase">{{__('buttons.send')}}</button>
        </div>
        <br class="clearBoth" />

    </form>
</div>
@endsection

<script src="{{ mix('/js/subpages/motions/motions.js') }}" defer></script>
<script>
    ! function(f, b, e, v, n, t, s)

    {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?

                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };

        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';

        n.queue = [];
        t = b.createElement(e);
        t.async = !0;

        t.src = v;
        s = b.getElementsByTagName(e)[0];

        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',

        'https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '401591258678974');

    fbq('track', 'PageView');
</script>

<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=401591258678974&ev=PageView&noscript=1" /></noscript>