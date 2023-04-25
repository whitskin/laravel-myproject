<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personals List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
    <a class="navbar-brand" href="{{ URL('/') }}">MyProject</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    @if (Route::has('login'))
    <ul class="navbar-nav ms-auto">
      @auth
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/personals') }}">Personals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/department') }}">Department</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Regiter</a>
        </li>
        @endif
                    @endauth
      </ul>
      @endif
    </div>
  </div>
</nav>
<br><br>

    <div class="container">

        @if(count($errors) > 0)

        <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
        </div>
        @endif

        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
        @endif


        <div class="row">
        <div class="col-sm-6" style="width: 11%;">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Personal
</button>
</div>

<div class="col-sm-6">
<div class="input-group mb-3">
<form action="{{ route('personals.filter') }}" method="GET">
<div class="input-group">
  <select class="form-select" name="filter" id="inputGroupSelect04 filter-select" aria-label="Example select with button addon">
  @foreach (\App\Models\Department::all() as $item)
        <option value="{{ $item->name }}">{{ $item->name }}</option>
        @endforeach
  </select>
  <button type="submit" class="btn btn-primary">Filter</button>
</div>    
</form>
</div>
</div>


</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Personal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('personals.store') }}" method="POST">
      {{ csrf_field() }}
      <div class="modal-body">
      
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Personal Name" required>
  </div>
  <div class="mb-3">
    <label class="form-label">E-Mail</label>
    <input type="email" class="form-control" name="email" placeholder="Email Adres" required>  
  </div>

  <div class="mb-3">
    <label class="form-label">Department</label>
    <select name="department" class="form-select form-select-sm">
    @foreach (\App\Models\Department::all() as $item)
        <option value="{{ $item->name }}">{{ $item->name }}</option>
        @endforeach
       </select>
  </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @if(count($items) > 0)
  @foreach($items as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->department}}</td>
      <td>
     <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id}}">Edit</a>
     <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}">Delete</a>
      </td>
    </tr>
    @include('personals.edit')
    @include('personals.delete')
    @endforeach
    @else
    @foreach (\App\Models\Personal::all() as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->department}}</td>
      <td>
     <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id}}">Edit</a>
     <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}">Delete</a>
      </td>
    </tr>
    @include('personals.edit')
    @include('personals.delete')
    @endforeach
    @endif
  </tbody>
</table>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    


</body>
</html>