
@extends('layouts.main')
@section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <h1 class="mb-3 text-center">{{ $title }}</h1>
   @if($posts->count())
      

        <div class="container">
            <div class="row">
                @foreach ($posts as $post) 
            {{-- //skip untuk melewati --}}
                    <div class="col-md-4  mb-4">
                        <div class="card" >
                          
                                <img src="{{ asset('storage/' . $post->image) }}"   class="img-fluid">
                                  
                            <div class="card-body">
                                <h5 class="card-title"><a href="/posts/{{$post->slug}}" class="text-decoration-none">{{ $post->title}}</a></h5>
                                <p>
                                    By <a href="#" class="text-decoration-none text-success fw-bolder">{{ $post->user->username }} </a>
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text">  <td>{{ Str::limit(strip_tags($post->content), 30, '...') }}</td></p>
                                <a href="/allPost/{{$post->slug}}"class="text-decoration-none btn btn-primary">Read more...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    @else
    <p class="text-center fs-4">No posts found</p>
    @endif  

    <div class="d-flex justify-content-center ">
        {{  $posts->links()}}
    </div>
  
@endsection

