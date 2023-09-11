@extends('dashboard.layouts.main')
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
                <div class="card shadow">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="text-secondary fw-bold fs-3">Data Profile</div>
                </div>
                <div class="card-body">
                  <div class="row">
                        @if($profile->count())
                        @foreach ($profile as $prof)
                        <div class="mb-3 row">
                          <label for="username" class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="username" value="{{ $prof->user->username }}">
                          
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" readonly class="form-control-plaintext" id="password" value=" {{ Str::limit(strip_tags($prof->user->password), 5, '...') }}">
                           
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nama" value="{{ $prof->nama }}">
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nim" value="{{ $prof->nim }}">
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="kelas" value="{{ $prof->kelas }}">
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="alamat" value="{{ $prof->alamat }}">
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="alamat" class="col-sm-2 col-form-label">Role</label>
                          <div class="col-sm-10">
                            @foreach ($prof->user->role()->get() as $role)
                            <button class="btn btn-sm btn-primary me-2">{{ $role->nama }}</button>
                            @endforeach      
                          </div>
                        </div>

                        <a href="profile/{{$prof->id}}/edit" class="btn btn-success" href="#" >Ubah Profile</a>


                        @endforeach
                            {{-- <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">role</th>
                              
                                  </tr>
                                </thead>
                                <tbody>
                              
                                  
                                  @foreach ($profile as $prof)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $prof->user->username }}</td>
                                    <td>{{ $prof->nama }}</td>
                                    <td>{{ $prof->nim }}</td>
                                    <td>{{ $prof->alamat }}</td>   
                                    <td>
                                      @foreach ($prof->user->role()->get() as $role)
                                      <button class="btn btn-sm btn-primary me-2">{{ $role->nama }}</button>
                                      @endforeach
                                  </td>
                                  <td>
                                  <a href="profile/{{$prof->id}}/edit" class="btn btn-success" href="#" ><i class="bi bi-brush"></i></a>
                                </td>
                                  </tr>

                                  @endforeach
                            
                                </tbody>
                              </table> --}}
                              @else
                  <p class="text-center fs-4">Belum ada Profil</p>
                  <a href="/profile/create" class="btn btn-primary w-2" >Buat Profile</a>
                </div>
            </div>
          </div>
        </div>
        </div>





    @endif  
@endsection

