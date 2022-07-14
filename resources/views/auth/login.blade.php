@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">

        <div class="mt-5">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            {{-- <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57"> --}}
            <h1 class="h3 mb-3 fw-normal">Login</h1>
        </div>

        @include('layouts.partials.messages')

        <div class="d-flex justify-content-center">
            <div class="w-25 mt-5">
                <div class="form-group form-floating mb-4">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="Email" required="required" autofocus>
                    <label for="floatingName">Email</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-4">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                        placeholder="Password" required="required">
                    <label for="floatingPassword">Password</label>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                <a href="{{ route('forget.password.get') }}">Reset Password</a>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </div>
            </div>
        </div>

        @include('auth.partials.copy')
    </form>
@endsection
