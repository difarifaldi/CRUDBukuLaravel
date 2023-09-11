@extends('dashboard.layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        
            <h1 class="h3 mb-3 fw-normal text-center">Edit Form</h1>
            <form action="{{ route('posts.update',$post->slug) }}" method="POST" enctype="multipart/form-data">
              @method('put')
              @csrf      {{-- agar website kita aman dari serangan orang lain --}} 
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title')
                is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
                @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

              </div>
              <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug')
                is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug',$post->slug) }}">
                @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

              {{-- image --}}
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
            
                <input class="form-control @error('image')
                is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>

              <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                @error('content')
                <p class="text-danger">{{ $message}} </p>
                @enderror
                <input id="content" type="hidden" name="content" value="{{ old('content',$post->content) }}">
                <trix-editor input="content"></trix-editor>
               
              </div>
              
              <button type="submit" class="btn btn-primary">Edit Post</button>
          
             
          
            </form>
        
    </div>
</div>
<script>
  // slug otomatis dari tittle
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
      fetch('/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data =>slug.value = data.slug)
    }); 


    // nampilin gambar ketika diklik choosen file
    function previewImage(){
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = 'block';

    const lihatgambar = URL.createObjectURL(image.files[0]);
      imgPreview.src = lihatgambar;

    }


</script>
@endsection
