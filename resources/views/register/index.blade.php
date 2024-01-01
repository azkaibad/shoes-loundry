@extends('layouts.main')


@section('container')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
  <div class="container py-5">
      <h1 class="display-3 text-white mb-3 animated slideInDown">Registration</h1>
      <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
              <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
              <li class="breadcrumb-item text-white active" aria-current="page">Registration</li>
          </ol>
      </nav>
  </div>
</div>
<!-- Page Header End -->

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
            <form action="/register" method="post">
              @csrf

              <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                <label for="alamat">Alamat</label>
                @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="tel" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="No.telp" required value="{{ old('no_telp') }}">
                <label for="no_telp">No.telp</label>
                @error('no_telp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
          
              <button class="btn btn-primary w-100 mt-3" type="submit">Register</button>
            </form>

            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
          </main>
    </div>
  </div>
</div>


    
@endsection