@extends('dashboard.layouts.main')
@section('container')
<div class="row justify-content-center ">
    <div class="col-lg-5 ">
        
            <h1 class="h3 mb-3 fw-normal text-center">Create Profile</h1>
            <form action="/profile" method="POST" enctype="multipart/form-data">
              @csrf      {{-- agar website kita aman dari serangan orang lain --}} 
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama')
                is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>

              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control @error('nim')
                is-invalid @enderror" id="nim" name="nim" required autofocus value="{{ old('nim') }}">
                @error('nim')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>

              <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas')
                is-invalid @enderror" id="kelas" name="kelas" required autofocus value="{{ old('kelas') }}">
                @error('kelas')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
              
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat')
                is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat') }}">
                @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
           
              <button type="submit" class="btn btn-primary">Create Profile</button>
          
             
          
            </form>
        
    </div>
</div>

@endsection
