<br class="clearBoth">
<div class="col-12">
    <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.email')}}</span></h4>

    <div class="col-12">
        <form method="POST" action="{{route('users.update.user.email')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$current->id ?? ''}}">
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="float-right my-3">
                <button type="submit" class="btn btn-primary fas fa-save btn-lg"></button>
            </div>
        </form>
    </div>
</div>
<br class="clearBoth">
<div class="col-12">
    <h4 class="section-title text-left"><span class=" ml-3 ">{{__('headlines.password')}}</span></h4>

    <div class="col-12">
        <form method="POST" action="{{route('users.update.user.password')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$current->id ?? ''}}">
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="float-right my-3">
                <button type="submit" class="btn btn-primary fas fa-save btn-lg"></button>
            </div>
        </form>
    </div>
</div>
<br class="clearBoth">