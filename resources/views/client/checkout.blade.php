<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"  href="#" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Checkout</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    
                        <div class="navbar-nav mr-auto py-0">
                            <a href="#" class="nav-item nav-link active">Home</a>
                            <a href="{{ route('client.cart') }}" class="nav-item nav-link">Shopping Cart</a>
                            <a href="{{ route('client.dashboard') }}" class="nav-item nav-link">Store</a>
                        </div>
                        
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


   


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div div class="col-md-6 form-group">
                            <form role="form" method="POST" action="{{ route('client.addpayement') }}">
                                @csrf
                        </div>
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input name="fname" class="form-control" type="text" placeholder="First Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input name="lname" class="form-control" type="text" placeholder="Last name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="email" class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input name="mobile" class="form-control" type="text" placeholder="+251-xxx-xxx-xxx">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address </label>
                            <input name="address" class="form-control" type="text" placeholder="address">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country </label>
                            <input name="country" class="form-control" type="text" placeholder="country">
                        </div>
                        
                    
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input name="city" class="form-control" type="text" placeholder="Adama">
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input name="zip" class="form-control" type="text" placeholder="xxxx">
                        </div>
                        <div class="col-md-6 form-group">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4><br>
                            <select name="payment" id="payment">
                                <option value="volvo">Paypal</option>
                                <option value="Direct Check">Direct Check</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                       
                    </form>
                 </div>
                </div>

               
            </div>
            
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <?php
                    $total = 0;
                    ?>
                   
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        @if(!empty($cart))
                        @foreach ($cart as $item)
                        <div class="d-flex justify-content-between">
                            <p>{{ $item['name'] }}{{ $item['qty'] }}</p>
                            <p>
                                <?php
                                   $prod_price= $item['qty']* $item['price'];
                                    $total +=$item['qty']* $item['price'];
                                    ?>
                                    {{ $prod_price }}
                            </p>
                        </div>
                        @endforeach
                        @endif
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $total }}</h6>
                        </div>
                        
                    </div>
                    
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                    </div>
                </div>
       
            </div>
        </div>
    </div>
    <!-- Checkout End -->
   <!-- Footer Start -->
   <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <a href="" class="text-decoration-none">
            <h2 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">&copy;{{ auth()->user()->name }}</span>Store</h2>
        </a>
        
    </div>
  
</div>

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>