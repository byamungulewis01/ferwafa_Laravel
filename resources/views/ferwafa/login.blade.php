@extends('components.layout.login_layout')
@section('content')

<div class="login-page">
    <div class="container d-flex align-items-center position-relative py-5">
      <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
        <div class="card-body p-0">
          <div class="row gx-0 align-items-stretch">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex justify-content-center flex-column p-4 h-100">
                <div class="py-5">
                  <h1 class="display-6 fw-bold">Football Association</h1>
                  <p class="fw-light mb-0">Rwanda Primus National League</p>
                </div>
              </div>
            </div>
            
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              @include('components.layout._flash-message') 
              <div class="d-flex align-items-center px-4 px-lg-5 h-100">
                <form class="login-form py-5 w-100" method="post" action="{{ route('fa_auth') }}">
                  @csrf
                  <div class="input-material-group mb-3">
                    <input class="input-material" id="login-username" type="text" name="email" autocomplete="off">
                    <label class="label-material" for="login-username">Email Address</label>
                    @error('email')<span x-data="{show: true}" x-init="setTimeout(()=> show = false , 2000)" x-show="show" class="text-danger">
                      {{ $message }}
                </span>@enderror
                  </div>
                  <div class="input-material-group mb-4">
                    <input class="input-material" id="login-password" type="password" name="password" >
                    <label class="label-material" for="login-password">Password</label>
                    @error('email')<span x-data="{show: true}" x-init="setTimeout(()=> show = false , 2000)" x-show="show" class="text-danger">
                      {{ $message }}
                </span>@enderror
                  </div>
                  <button class="btn btn-primary mb-3" id="login" type="submit">Login</button><br> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
@endsection