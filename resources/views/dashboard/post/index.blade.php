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
                    <div class="text-secondary fw-bold fs-3">Data Post</div>
                    <a href="/posts/create" class="btn btn-primary w-2" >Post Baru</a>
                </div>
                <div class="card-body ">
                  <div class="row">
                        @if($posts->count())
                            <table class="table ">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                              
                                  
                                  @foreach ($posts as $post)
                                  <tr>  
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->user->username }}</td>
                                
                                    <td>{{ Str::limit(strip_tags($post->content), 30, '...') }}</td>
                                    <td> <img src="{{ asset('storage/' . $post->image) }}"   class="img-fluid" style="width: 65px"></td>
                                    <td>
                                      <a href="/posts/{{$post->slug}}" class="btn btn-warning"><i class="bi bi-eye"></i></a>
                                      <a href="posts/{{$post->slug}}/edit" class="btn btn-success" href="#" ><i class="bi bi-brush"></i></a>
                                      <form action="{{route('posts.destroy',$post->slug)}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                      <button   class="btn btn-danger h-full  border-0" onclick="return confirm('Are you sure delete category?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                    </td>
                                
                                  </tr>

                                  @endforeach
                            
                                </tbody>
                              </table>
                            
                              @else
                  <p class="text-center fs-4">Belum membuat Post</p>
                </div>
            </div>
          </div>
        </div>
        </div>





    @endif  
@endsection

