@extends('layouts.guest')
@section('title') {{__('titles.title_motions')}} @endsection
@section('content')

<div class="col-12 m-0 p-0">
    <div class="text-center align-center my-36">
        {!!__('headlines.motion_end_thank_you')!!}

        @include('subpages/motions/forms/motion_form_price')
        
        @if($transaction_id)
        <div class="py-6">
            <a class="btn btn-primary" href="{{route('payment.order.pay.transaction',['transaction_id'=>$transaction_id])}}" target="_blank">
                {{__('buttons.pay')}}
            </a>
        </div>
        @endif
        
    </div>

    <!-- <form method="POST" enctype="multipart/form-data" action="{{route('payment.order.pay')}}">
        @csrf
        <input type="hidden" name="id" value="{{$transaction_id}}">
        <button type="submit" class="btn btn-primary float-right">
            {{__('buttons.pay')}}
        </button>
    </form> -->
</div>
@endsection