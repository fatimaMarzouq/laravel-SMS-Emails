@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <!-- <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

            </div>
          </div> -->
          <div class="w-full">
            <div class="auth-form-wrapper px-4 py-5">
            <a href="{{ url('/') }}" class="noble-ui-logo d-block mb-2">Reviews<span>Booster</span></a>
              <h5 class="text-muted fw-normal mb-4">Create a free account.</h5>
              <form class="forms-sample" method="POST" action="{{ route('register') }}">
              @csrf
                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Name</label>
                  <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="Name" placeholder="Name"  name="name" :value="old('name')" required autofocus>
                @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
                
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="userEmail" placeholder="Email" name="email" :value="old('email')" required>
                  @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password" name="password"
                                required autocomplete="new-password" >
                                @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password"
                                name="password_confirmation" required  required >
                                @error('password_confirmation')
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
                  <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Sign up</button>
                  <!-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="twitter"></i>
                    Sign up with twitter
                  </button> -->
                </div>
                <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection