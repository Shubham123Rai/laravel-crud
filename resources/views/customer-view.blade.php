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

    @if (session()->get('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session()->get('success')}}
        <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->get('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session()->get('error')}}
        <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container"> 
        <div class="row m-2">
            <h2>Customer</h2>
            <form action="" method="" class="col-9 mt-2">
                <div class="form-group">
                    <input type="search" class="form-control"  name="search" placeholder="Search by name or email" value="{{$search}}" />
                </div>
                <button class="btn btn-primary mt-2">Search</button>
                <a href="{{url('/customer/view')}}">
                    <button class="btn btn-primary mt-2" type="button">Reset</button>
                </a>
            </form>  
            <div class="col-3">
            <a href="{{route('customer.create')}}">
                <button class="btn btn-primary d-inline-block m-2 float-end"> Add </button>
            </a>
            <a href="{{url('/logout')}}">
                <button class="btn btn-danger d-inline-block m-2 float-end"> Logout </button>
            </a>
            </div>
        </div>    
        <table class="table">
            {{-- <pre>
                {{print_r($customer)}}
            </pre> --}}
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $value)
                    <tr>
                        
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>
                        @if ($value->gender == 'Male')
                            Male
                        @elseif($value->gender == 'Female')
                            Female
                        @else
                            Other
                        @endif
                        </td>
                        {{-- <td>{{get_formatted_date($value->dob, "d-M-Y")}}</td> --}}
                        <td>{{$value->dob, "d-M-Y"}}</td>
                        <td>
                        @if ($value->Status == 1)
                            <a href="{{url('/customer/block_id').'/'.$value->customer_id}}" class="btn btn-success btn-sm">Active</a>
                        @else
                        <a href="{{url('/customer/unblock_id').'/'.$value->customer_id}}" class="btn btn-danger btn-sm">Inactive</a>

                        @endif
                        </td>
                        <td>
                            {{-- <a href="{{route('customer.delete', ['id'=> $value->customer_id])}}"> --}}
                            <a href="{{url('/customer/delete')}}/{{$value->customer_id}}">
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </a>

                            <a href="{{route('customer.edit',['id'=>$value->customer_id])}}">
                            <button class="btn btn-primary btn-sm ml-2">Edit</button>
                            </a>
                        </td>

                    </tr>
                @endforeach
                
                
            </tbody>
        </table>
        {{-- <div class="row">
            {{$customer->links()}}
        </div> --}}
    </div>
</body>
</html>