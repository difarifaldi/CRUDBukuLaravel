@extends('layouts.main')
@section('container')
<div class="row justify-content-center ">
    <div class="col-lg-5 ">
        
            <h1 class="h3 mb-3 fw-normal text-center">Register User</h1>
            <form action="/user" method="POST" enctype="multipart/form-data">
              @csrf      {{-- agar website kita aman dari serangan orang lain --}} 
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username')
                is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password')
                is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>

              <div class="mb-3">
                <label  class="form-label">Pilih Role</label><br>
           @foreach ($roles as $role )
             <input type="checkbox" name="role_id[]" value="{{ $role->id }}">
             <label class="form-label">{{ $role->nama }}</label>
           @endforeach
              </div>
              <button type="submit" class="btn btn-primary">Create User</button>
  
             
          
            </form>
        
    </div>
</div>

@endsection
