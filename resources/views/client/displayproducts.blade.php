<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body class="clickup-chrome-ext_installed">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
        <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
<div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="{{ route('client.dashboard') }}">
        <h1 style="color: rgb(92, 102, 238)">Store CRM</h1> 
    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    {{-- <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/teamm-1-800x800.jpg">
                    </span> --}}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href=href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My profile</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span>Activity</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
            <div class="row">
                <div class="col-6 collapse-brand">
                    <a  href="{{ route('client.dashboard') }}">
                        <h1 style="color: blue">Store Store</h1>
                    </a>
                </div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
            <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-search"></span>
                    </div>
                </div>
            </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.dashboard') }}">
                    <i class="ni ni-tv-2 text-primary"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples1">
                    <span class="glyphicon glyphicon-th-list">
                    <span class="nav-link-text" style="color: #141212;">{{ __('Manage Products') }}</span>
                </a>
                
                <div class="collapse show" id="navbar-examples1">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.products') }}">
                                <span class="nav-link-text" style="color: #141212;"> {{ __('Add Products') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            
                            <a class="nav-link" href="{{ route('client.displayproducts') }}">
                                <span class="nav-link-text" style="color: #141212;"> {{ __('Display Products') }}
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples2">
                    <span class="glyphicon glyphicon-th-list">
                    <span class="nav-link-text" style="color: #141212;">{{ __('Manage Category') }}</span>
                </a>
                
                <div class="collapse show" id="navbar-examples2">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            
                            <a class="nav-link" href="{{ route('client.category') }}">
                                <span class="nav-link-text" style="color: #141212;"> {{ __('Add category') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            
                            <a class="nav-link" href="{{ route('client.displaycategory') }}">
                                <span class="nav-link-text" style="color: #141212;"> {{ __('Display category') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="ni ni-planet text-blue"></i> Icons
                </a>
           
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="ni ni-circle-08 text-pink"></i> Register
                </a>
            </li>
           
        </ul>
        <!-- Divider -->
        
    </div>
</div>
</nav>                
    <div class="main-content">
        <!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
<div class="container-fluid">
    <!-- Brand -->
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('client.dashboard') }}">Dashboard</a>
    <!-- Form -->
    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
            </div>
        </div>
    </form>
    <!-- User -->
    <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    {{-- <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-44-800x800.jpg">
                    </span> --}}
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My profile</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span>Activity</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
</div>
</nav>    
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
<div class="container-fluid">

    
</div>
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            @include('layouts.message')
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Displaying Products</h3>
                        </div>
                        {{-- <div class="col-4 text-right">
                            <a href="{{ route('client.register') }}" class="btn btn-sm btn-primary">Register client</a>
                        </div> --}}
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Product Category</th>
                                <th scope="col"> Price</th>
                                <th scope="col"> Quantity</th>
                                <th scope="col">created on</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                           @if(count($products)>0)
                            @foreach ($products as $product)
                                
                            
                                <tr>
                                   

                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        {{ $product->product_description }}
                                        
                                    </td>
                                    <td>
                                        {{ $product->product_category }}
                                        
                                    </td>
                                    <td>
                                        {{ $product->product_price_per_unit }}
                                        
                                    </td>
                                    <td>
                                        {{ $product->product_quantity }}
                                        
                                    </td>
                                    <td>{{ $product->created_at }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-success" href="/client/{{ $product->id }}/edit">Edit</a>
                                        <a class="btn btn-danger" href="/client/{{ $product->id }}/deleteproduct">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <h1>no user found</h1>
                                @endif
                                
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
        
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
                © 2022 <a href="#" class="font-weight-bold ml-1" target="_blank">CRM Store</a>
            </div>
        </div>
        <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                <li class="nav-item">
                    <a href="#" class="nav-link" target="_blank">CRM Store</a>
                </li>
               
                <li class="nav-item">
                    <a href="#" class="nav-link" target="_blank">About Us</a>
                </li>
               
                <li class="nav-item">
                    <a href="#" class="nav-link" target="_blank">Github</a>
                </li>
            </ul>
            </div>
        </div>
    </footer>  
</div>
</div>

    
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
            
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body>
</html>
