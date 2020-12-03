@extends('master')
@section('pageTitle', 'Elctro - Register')
@section('content')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="section-title">
                    <h3 class="title">{{ __('Register') }}</h3>
                </div>


                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="firstname"
                               class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="firstname" type="text" class="input @error('firstname') is-invalid @enderror"
                                   name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname"
                                   autofocus>

                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname"
                               class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="lastname" type="text" class="input @error('lastname') is-invalid @enderror"
                                   name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname"
                                   autofocus>

                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="input @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation"
                                   required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="streetname" class="col-md-4 col-form-label text-md-right">{{ __('Street name') }}</label>

                        <div class="col-md-6">
                            <input id="streetname" type="text" class="input @error('streetname') is-invalid @enderror"
                                   name="streetname" required>

                            @error('streetname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="streetnumber" class="col-md-4 col-form-label text-md-right">{{ __('Street number') }}</label>

                        <div class="col-md-6">
                            <input id="streetnumber" type="number" class="input @error('streetnumber') is-invalid @enderror"
                                   name="streetnumber" required>

                            @error('streetnumber')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="postalcode" class="col-md-4 col-form-label text-md-right">{{ __('Postalcode') }}</label>

                        <div class="col-md-6">
                            <input id="postalcode" type="text" class="input @error('postalcode') is-invalid @enderror"
                                   name="postalcode" required>

                            @error('postalcode')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="input @error('city') is-invalid @enderror"
                                   name="city" required>

                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                        <div class="col-md-6">
                            <input id="country" type="text" class="input @error('country') is-invalid @enderror"
                                   name="country" required>

                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="primary-btn order-submit">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
