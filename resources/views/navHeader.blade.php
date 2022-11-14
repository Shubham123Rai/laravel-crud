<div class="container-fluid bg-dark">
    <div class="container">
    <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand" href="#">Laravel-8</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/login')}}">Login </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{url('/customer')}}">Register</a>
            </li> --}}

            <li class="nav-item">
              <a class="nav-link" href="{{route('customer.create')}}">Register</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link " href="{{url('/customer/view')}}">Customer</a>
            </li>
          </ul>
          
        </div>
      </nav>
    </div>
</div>
