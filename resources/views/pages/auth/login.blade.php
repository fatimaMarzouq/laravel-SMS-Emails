@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <!-- <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url({{ url('/assets/images/login.jpg') }})">

            </div>
          </div> -->
          <div class="">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="{{ url('/') }}" class="noble-ui-logo d-block mb-2">Reviews<span>Booster</span></a>
              <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
              <form class="forms-sample" method="POST" action="{{ route('login') }}">
              @csrf
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="userEmail" placeholder="Email" name="email" :value="old('email')" required autofocus>
                  @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="userPassword" name="password"
                                required autocomplete="current-password"  placeholder="Password">
                                @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>
                <!-- <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div> -->
                <div>
                  
                  <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    
                    Login 
                  </button>
                  @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </div>                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection