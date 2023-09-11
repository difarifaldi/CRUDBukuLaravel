@extends('dashboard.layouts.main')

@section('container')
<div class="container ms-3">
    <div class="row  my-3">
        <div class="col-lg-8">
           
            <h1 class="mb-3">{{ $post->title}}</h1>
            
            <a href="/posts" class="btn btn-success"> <span data-feather="arrow-left" ></span> Kembali</a> 
          
            <div style="max-height: 350px;overflow: hidden;">
                <img src="{{ asset('storage/' . $post->image) }}"   class="img-fluid mt-3">

            </div>
               
           
            <article class="my-3 fs-6">
                <p>{!! $post->content!!}</p>
            </article>
            {{-- agar bisa menjalankan tag yang ada di html make !! contohnya kaya <p> --}}
             
       
        </div>
    </div>
</div>
@endsection