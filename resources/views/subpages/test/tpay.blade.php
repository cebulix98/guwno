@extends('layouts.app')
@section('title') test @endsection
@section('content')
<div class="col-md-12 row m-0 p-0 align-items-start">

    <form method="POST" enctype="multipart/form-data" action="{{route('pay')}}">
        @csrf
        <button type="submit" class="btn btn-primary float-right">
            test
        </button>
    </form>

</div>
@endsection
