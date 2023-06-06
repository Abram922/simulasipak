@extends('layouts.bootstrap')

@section('content1')
<section class="h-100 gradient-form" style="background-color: ">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <h4 class="mt-1 mb-5 pb-1">Simulasi Penilaian Angka Kredit Dosen</h4>
                  </div>
  
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <h6>Pengalaman Menghitung Angka Kredit yang Menyenangkan</h6>
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="email">Email</label> 
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      
                    </div>
  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example22">Password</label> 
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      
                    </div>
  
                    <div class="text-center mb-5 pt-1  pb-1">
                      <button class="btn btn-primary btn-block fa-lg  mb-3" type="submit">Masuk</button>
                    </div>

                    
                    <div class="text-center" >
                        {{-- <a class="text-muted" href="#!">Lupa Password?</a> --}}
                    </div>
                    
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a></p>
                      
                    </div>
  
                  </form>
  
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center ">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <img src="{{ asset('aset_web/p1.png') }}" class="img-responsive" alt="Deskripsi gambar">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    
@endsection




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
