<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

  @include('navHeader')

  @if (session()->get('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session()->get('error')}}
        <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
  {{-- @php
      print_r($errors->all());
  @endphp --}}
    <form action="{{url('/')}}/register" method="post">
        @csrf
    <div class="container">
        <h1 class="text-center">Registration</h1>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name')}}">
          <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror 
          </span>
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('email')}}">
            <span class="text-danger">
              @error('email')
                  {{$message}}
              @enderror 
            </span>
          </div>

          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId" >
            <span class="text-danger">
              @error('password')
                  {{$message}}
              @enderror 
            </span>
          </div>

          <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" id="" class="form-control" placeholder="" aria-describedby="helpId" >
            <span class="text-danger">
              @error('confirm_password')
                  {{$message}}
              @enderror 
            </span>
          </div>

          <button class="btn btn-primary mt-3">Submit</button>
    </div>
    </form>
</body>
</html>