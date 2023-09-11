
@extends('layouts.main')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container d-flex justify-content-center m-5 border rounded-1 shadow p-3 mb-5 ">
    <div class="row">
        <div class="col">
            <h1 class="text-center text-primary bg-gradient">Halaman Utama</h1>
            <figcaption class="blockquote-footer text-center mt-1">
                Sekilas Info 
              </figcaption>
            <p>Register akun terdiri dari 2 role yaitu user dan admin. Setelah register dapat melakukan login baik itu login user maupun admin. Apabila login sebagai admin, akan masuk ke menu dashboard yang mana dapat melakukan CRUD Post <mark>(Hanya melakukan CRUD milik sendiri)</mark>, Create Role serta Create dan Update Profile. Sedangkan apabila login sebagai user, dapat melihat data post yang dibuat oleh beberapa admin, melihat data semua role dan semua profile. Selain itu, role user dapat menambahkan profile di menu Dashboard</p>
            
            @auth
                @else
                <div class="d-flex justify-content-center"> <!-- Tambahkan d-flex dan justify-content-center di sini -->
                    <a href="/loginAdmin" class="btn btn-outline-danger mx-2">Login Admin</a>
                    <a href="/loginUser" class="btn btn-outline-primary mx-2">Login User</a>
                </div>
                
                <small class="d-block text-center mt-2">Belum punya akun? <a href="/user/create" class="text-decoration-none">Klik disini...</a></small>
            @endauth
            
        </div>
    </div>
</div>

@endsection