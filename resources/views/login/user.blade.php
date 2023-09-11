@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">

      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

        <main class="form-signin ">
            <h1 class="h3 mb-3 fw-normal text-center">Login User</h1>
            <form action="#" method="POST">
              @csrf
              <div class="form-floating">
                <input type="text" class="form-control @error('username')
                is-invalid @enderror" name="username" id="username"  autofocus required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
              <div class="form-floating mt-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
          
             
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>     
              <small class="d-block text-center mt-2">Belum punya akun? <a href="/user/create" class="text-decoration-none">Klik disini...</a></small>  
                     
            </form>
           
          </main>
    </div>
</div>

@endsection