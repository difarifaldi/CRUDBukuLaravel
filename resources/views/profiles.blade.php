@extends('layouts.main')
@section('container')
@if (session()->has('success'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

  

        <div class="container">
            <div class="row">
              <div class="col">
               
          
                  <div class="row">
                        @if($profiles->count())
                        <h1 class="text-center">Data User</h1>
                        <p class=" text-center text-muted">Data dibawah ini merupakan user yang sudah menambahkan profile.<br> Jika belum mengisi data profile silahkan menuju ke <strong>Dashboard</strong></p>
                            <table class="table table-bordered mt-5">
                                <thead class="text-center">
                                  <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Role</th>   
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($profiles as $profile)
                                  <tr>
                                    <td class="text-center">{{ $profile->user->username }}</td>
                                    <td class="text-center"> {{ str_repeat('*', min(strlen($profile->user->password), 5)) }}</td>
                                    <td class="text-center">{{ $profile->nama }}</td>
                                    <td class="text-center">{{ $profile->nim }}</td>
                                    <td class="text-center">{{ $profile->kelas }}</td>
                                    <td class="text-center">{{ $profile->alamat }}</td>
                                    <td >
                                      @foreach ($profile->user->role()->get() as $role)
                                      <button class="btn btn-sm btn-primary m-2">{{ $role->nama }}</button>
                                      @endforeach
                                  </td>
                                  
                                
                                
                                  </tr>

                                  @endforeach
                            
                                </tbody>
                              </table>
                              @else
                  <p class="text-center fs-4">No Profile found</p>
                </div>
              </div>
            </div>
        </div>
        





    @endif  
@endsection

