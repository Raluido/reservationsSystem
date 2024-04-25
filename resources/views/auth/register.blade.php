@extends('layouts.auth-master')

@section('content')
<form method="post" action="{{ route('register.perform') }}">
    @csrf
    <div class="mt-5">
        <h1 class="h3 mb-3 fw-normal">Register</h1>
    </div>

    <div class="d-flex justify-content-center">
        <div class="mt-5">

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
                <label for="floatingName">Name</label>
                @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                <label for="floatingEmail">Email address</label>
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone" required="required" autofocus>
                <label for="floatingName">Phone</label>
                @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <select name="padel_level" id="type" class="form-control">
                    <option disabled selected value></option>
                    <option value="Low">Bajo</option>
                    <option value="Medium">Medio</option>
                    <option value="Hight">Alto</option>
                </select>
                <label for="floatingPadel_level" class="form-label">Nivel de padel</label>
                @if ($errors->has('padel_level'))
                <span class="text-danger text-left">{{ $errors->first('padel_level') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-5">
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                <label for="floatingConfirmPassword">Confirm Password</label>
                @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <div class="">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </div>
        </div>
    </div>

    @include('auth.partials.copy')
</form>
@endsection