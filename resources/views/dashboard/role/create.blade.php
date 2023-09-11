@extends('dashboard.layouts.main')
@section('container')
<div class="row justify-content-center ">
    <div class="col-lg-5 ">
        
            <h1 class="h3 mb-3 fw-normal text-center">Buat Role</h1>
            <form action="/role" method="POST" enctype="multipart/form-data">
              @csrf      {{-- agar website kita aman dari serangan orang lain --}} 
              <div class="mb-3">
                <label for="nama" class="form-label">Role</label>
                <input type="text" class="form-control @error('nama')
                is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
             

              <button type="submit" class="btn btn-primary">Create Role</button>
          
             
          
            </form>
        
    </div>
</div>

@endsection
