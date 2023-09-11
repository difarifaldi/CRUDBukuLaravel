<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    {{-- <link rel="stylesheet" href="/css/umi.css"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Belajar Laravel | {{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
</head>
  </head>
  <body>
    @include('layouts.navbar')
    <div class="container">
      <div class="row my-4">
          <div class="col-sm-2">
              <div class="card shadow">
                  <div class="card-header d-flex justify-content-between align-items-center">
                      <div class="text-secondary fw-bold fs-3">Menu</div>
                  </div>
                  <div class="card-body">
                      <div class="row p-2">
                          <a href="/profile" class="btn btn-success p-2">Profile</a>
                          <hr>
                          @foreach (auth()->user()->role as $role )
                            @if (  $role->nama ==  "Admin" || $role->nama == "admin")
                            <a href="/posts" class="btn btn-warning p-2 fw-medium mb-3">Post</a>                 
                            <hr>     
                            <a href="/role" class="btn btn-danger p-2">Role</a>
                           
                            @endif
                          @endforeach  
                         
                    
  
                      </div>
                  </div>
              </div>
          </div>
  
  
          <div class="col-sm-10">
            @yield('container')
          </div>
      </div>
  </div>
 
 

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>

</html>