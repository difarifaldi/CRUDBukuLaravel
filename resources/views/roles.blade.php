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
                
                        @if($roles->count())
                        <h1 class="text-center">Data Role</h1>
                            <table class="table table-bordered mt-5">
                                <thead class="text-center">
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">User</th>
                              
                                  </tr>
                                </thead>
                                <tbody>
                              
                                  
                                  @foreach ($roles as $rl)
                                  <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $rl->nama }}</td>
                                    <td >
                                      @foreach ($rl->user()->get() as $user)
                                      <button class="btn btn-sm btn-success m-2">{{ $user->username }}</button>
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
        
        





    @endif  
@endsection

