<div class="col-12 my-6 white">
    @if(isset($total_price))
        <span>{{__('labels.price')}}: </span> <b>{{$total_price}}</b> zł
    @endif
</div>