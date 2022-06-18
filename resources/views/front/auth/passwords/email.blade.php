@extends('front.auth.layout.index')
@section('content')
    <form class="login-form form" method="POST" action="{{ route('front.password.email') }}">
                        @csrf
                            <h3 class="h3">Forgot Password</h3>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Registered Email" required autocomplete="email" autofocus>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-regular w-100">
                            <div class="return-login">
                                <a href="{{ route('front.login') }}">Return to Login</a>
                            </div>
                        </form>

                   {{--  <form method="POST" action="{{ route('front.password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form> --}}
@endsection
