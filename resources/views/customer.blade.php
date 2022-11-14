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

    <form action="{{url('/')}}/customer" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container mt-4 card p-3 bg-white">
        <h1 class="text-center text-primary">Customer Registration</h1>
        <div class="row">
            <div class="form-group col-md-6 ">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" value="{{old('name')}}" />
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror 
            </span>
            </div>

            <div class="form-group col-md-6 ">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" value="{{old('email')}}" />
                <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror 
                </span>
            </div>

            <div class="form-group col-md-6 ">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" />
                <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror 
                </span>
            </div>

            {{-- <div class="form-group col-md-6 ">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control" />
                <span class="text-danger">
                @error('confirm_password')
                    {{$message}}
                @enderror 
                </span>
            </div> --}}

            {{-- <div class="form-group col-md-6 ">
                <label for="">Country</label>
                <input type="text" name="country" id="" class="form-control" />
                <span class="text-danger">
                    @error('country')
                        {{$message}}
                    @enderror 
                </span>
            </div> --}}

            {{-- <div class="form-group col-md-6 ">
                <label for="">State</label>
                <input type="text" name="state" id="" class="form-control" />
                <span class="text-danger">
                    @error('state')
                        {{$message}}
                    @enderror 
                </span>
                </div> --}}

                <div class="form-group col-md-6 ">
                    <label for="">Address</label>
                    <input type="text" name="address" id="" class="form-control" />
                    <span class="text-danger">
                        @error('address')
                            {{$message}}
                        @enderror 
                    </span>
                </div>

                <div class="form-group col-md-6 ">
                {{-- <p>Gender:</p> --}}
                <label>Gender</label>
                <select name="gender" class="form-control" >
                   <option>Male</option>
                   <option>Female</option>
                   <option>Other</option>
                </select>
                <span class="text-danger">
                    @error('gender')
                        {{$message}}
                    @enderror 
                </span>
                </div>

                <div class="form-group col-md-6 ">
                    <label for="">Date of birth:</label>
                    <input type="date" class="form-control" name="dob">
                    <span class="text-danger">
                        @error('dob')
                            {{$message}}
                        @enderror 
                    </span>
                </div>

                


            <button class="btn btn-primary mt-3">Submit</button>
        </div>
    </div>
    </form>
    
</body>
</html>