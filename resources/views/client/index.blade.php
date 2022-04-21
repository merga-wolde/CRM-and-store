<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Store Front</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('client') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('client') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('client') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
      
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-4 d-none d-lg-block">
                <a href="{{ route('client.index') }}" class="text-decoration-none">
                    <h3 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">{{ auth()->user()->name }}-STORE</span></h3>
                </a>
            </div>
            <div class="col-lg-5 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <img style=" width: 30px; height: 30px; border-radius: 50%;"  class="form-logo" src="{{ asset('storage/images/'.auth()->user()->logo) }}" alt="Store Logo">
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{ Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div> --}}
                        @if (count($category))
                            @foreach ($category as $item)
                            <div  class="row border-top px-xl-5">
                            <form role="form" action="{{ route('client.showcategory') }}" method="POST">
                                @csrf
                                <input type="hidden" name="category" value="{{ $item-> category }}">
                                <button  style="width: 100%; height:40px" type="submit" class="btn btn-sm text-dark p-0 nav-item nav-link">{{ $item-> category}}</button>
                            </form>
                            </div>
                            @endforeach
                    
                    @endif
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h3 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">{{ auth()->user()->name }}-STORE</span></h3>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="#" class="nav-item nav-link active">Home</a>
                            <a href="{{ route('client.cart') }}" class="nav-item nav-link">Shopping Cart</a>
                            <a href="{{ route('client.dashboard') }}" class="nav-item nav-link">Store</a>
                        </div>
                        
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            {{-- <img class="img-fluid" src="{{ asset('client') }}/img/carousel-1.jpg" alt="Image"> --}}
                            <img style="width: 100%;  height:700px;"  class="img-fluid" src="{{ asset('storage/images/'.auth()->user()->logo) }}" alt="Store Logo">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Come and order your products</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="{{ route('client.index') }}" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img style="width: 100%;  height:700px;"  class="img-fluid" src="{{ asset('storage/images/'.auth()->user()->logo) }}" alt="Store Logo">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Come and order your products</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="{{ route('client.index') }}" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Products Start -->
     @if (session('messsage'))
        {{ session('message') }}
            
        @endif
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Recent Products</span></h2>
        </div>
       
        <div class="row px-xl-5 pb-3">
            
            @for ($i=0; $i< 8; $i++)
                @if ($i < count($product))
                {{-- @foreach ($product as $products ) --}}
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                {{-- <img class="img-fluid w-100" src="{{ asset('client') }}/img/product-1.jpg" alt=""> --}}
                                
                                <img  class="img-fluid w-100" src="{{ asset('storage/images/'.$product[$i]-> product_image) }}" alt="Store Logo">

                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $product[$i]-> product_name }}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{ $product[$i]-> product_price_per_unit }}</h6><h6 class="text-muted ml-2"><del>{{ $product[$i]-> product_price_per_unit }}</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <form action="{{ route('client.shopcart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product[$i]-> id }}">
                                    <br>
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center" name="quantity" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                            </form>
                            </div>
                        </div>
                    </div>
            
                    @endif
            {{-- @endforeach --}}
            @endfor
            
     
        
            
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <a href="" class="text-decoration-none">
                <h2 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">&copy;{{ auth()->user()->name }}</span>Store</h2>
            </a><br>
            
            <div class="col-lg-8 col-md-12">
            
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <img style=" width: 200px; height: 200px; border-radius: 50%;"  class="form-logo" src="{{ asset('storage/images/'.auth()->user()->logo) }}" alt="Store Logo">
                    </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Quick Link</h5>
                    <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a><br>
                    <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a><br>
                    <a class="text-dark" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
        </div>
        </div>
        
      
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('client') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('client') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('client') }}/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{ asset('client') }}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('client') }}/js/main.js"></script>
</body>

</html>