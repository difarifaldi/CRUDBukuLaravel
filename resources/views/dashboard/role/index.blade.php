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
                    <div class="text-secondary fw-bold fs-3">Data Role</div>
                    <a href="/role/create" class="btn btn-primary w-2" >Tambah Role</a>
                </div>
                <div class="card-body">
                  <div class="row">
                        @if($role->count())
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">User</th>
                              
                                  </tr>
                                </thead>
                                <tbody>
                              
                                  
                                  @foreach ($role as $rl)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rl->nama }}</td>
                                    <td>
                                      @foreach ($rl->user()->get() as $user)
                                      <button class="btn btn-sm btn-primary me-2">{{ $user->username }}</button>
                                      @endforeach
                                  </td>
                                  
                                
                                
                                  </tr>

                                  @endforeach
                            
                                </tbody>
                              </table>
                              @else
                  <p class="text-center fs-4">No role found</p>
                </div>
            </div>
          </div>
        </div>
        </div>





    @endif  
@endsection

