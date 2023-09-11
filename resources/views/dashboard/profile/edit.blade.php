@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profile</h1>
  
</div>
<div class="col-lg-8">
    <form method="POST" action="/profile/{{ $profile->id }}" class="mb-5" enctype="multipart/form-data"> 
        @method('put')
       
        @csrf
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control @error('username')
          is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username', $profile->user->username) }}">
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>

        <div class="mb-3">
         
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password')
            is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password', Str::limit(strip_tags($profile->user->password), 5, '...')) }}">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

       

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama')
          is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $profile->nama) }}">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>

        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" class="form-control @error('nim')
          is-invalid @enderror" id="nim" name="nim" required value="{{ old('nim',$profile->nim) }}">
          @error('nim')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>

        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <input type="text" class="form-control @error('kelas')
          is-invalid @enderror" id="kelas" name="kelas" required value="{{ old('kelas',$profile->kelas) }}">
          @error('kelas')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control @error('alamat')
          is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat',$profile->alamat) }}">
          @error('alamat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>

      
      
     
        
        <button type="submit" class="btn btn-primary">Update Profile</button>
      </form>
</div>

@endsection