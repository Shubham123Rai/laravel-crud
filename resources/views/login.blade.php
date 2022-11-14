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

    <div class="container align-content-center col-8 ">
        <div class="row mt-2">
            @csrf
            
            <form action="{{url('/')}}/check" method="get" class=" mt-2 text-center">
                <div class="container mt-4 card p-3 bg-transparent text-center">
                    <h1 class="text-center text-primary">Login</h1><hr>
                    <div class="row">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId" value=""> 
                        </div>
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror 
                        </span>
                
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId" > 
                        </div> 
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror 
                        </span>

                        <button class="btn btn-primary mt-3">Submit</button>

                    </div>
                </div>      
            </form>
        </div>
    </div>
</body>
</html>