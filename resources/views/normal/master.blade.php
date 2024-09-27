<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>The Brand</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/custom.css">

    {{-- [if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] --}}

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php 
    $men_arry = ["RunningShoes","WalkingShoes","CasualShoes","SportShoes","Sneakers","FlipFlops","Slides"];
    $women_arry = ["RunningShoes","WalkingShoes","CasualShoes","SportShoes","Sneakers","FlipFlops","Slides"];
    $kids_arry = ["CasualShoes","SportShoes","Sneakers","FlipFlops","Girls","Boys"];
 ?>
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{ URL::to('/') }}/index"><span style="font-family: Georgia, 'Times New Roman', Times, serif; color:black; font-size:40px;">The</span><span style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color:cadetblue;font-size:30px;">Brand</span></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{ URL::to('/') }}/index">Home</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li> --}}
                        <li class="dropdown megamenu-fw">
                            <a href="{{ URL::to('/') }}/men" class="nav-link dropdown-toggle arrow" data-toggle="dropbtn">MEN</a>
                            <ul class="dropdown-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">SHOES</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="{{ URL::to('/') }}/men_type_shoes/{{ urlencode($men_arry[0]) }}">Running Shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/men_type_shoes/{{ urlencode($men_arry[1]) }}">Walking Shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/men_type_shoes/{{ urlencode($men_arry[2]) }}">Casual Shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/men_type_shoes/{{ urlencode($men_arry[3]) }}">Sports shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/men_type_shoes/{{ urlencode($men_arry[4]) }}">Sneakers</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">SLIPPERS</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="{{ URL::to('/') }}/men_type_shoes/{{ urlencode($men_arry[5]) }}">FlipFlops</a></li>
                                                    <li><a href="{{ URL::to('/') }}/men_type_shoes/{{ urlencode($men_arry[6]) }}">Slides</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                        </div>
                                        <div class="col-menu col-md-3">
                                            <img src="{{ URL::to('/') }}/images/men/men_dropdown.jpg" alt="" height="200px" width="250px">
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown megamenu-fw">
                            <a href="{{ URL::to('/') }}/user_women" class="nav-link dropdown-toggle arrow" data-toggle="dropbtn">WOMEN</a>
                            <ul class="dropdown-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">SHOES</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="{{ URL::to('/') }}/women_type_shoes/{{ urlencode($women_arry[0]) }}">Running Shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/women_type_shoes/{{ urlencode($women_arry[1]) }}">Walking Shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/women_type_shoes/{{ urlencode($women_arry[2]) }}">Casual Shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/women_type_shoes/{{ urlencode($women_arry[3]) }}">Sports shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/women_type_shoes/{{ urlencode($women_arry[4]) }}">Sneakers</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">SLIPPERS</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="{{ URL::to('/') }}/women_type_shoes/{{ urlencode($women_arry[5]) }}">FlipFlops</a></li>
                                                    <li><a href="{{ URL::to('/') }}/women_type_shoes/{{ urlencode($women_arry[6]) }}">Slides</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                        </div>
                                        <div class="col-menu col-md-3">
                                            <img src="{{ URL::to('/') }}/images/women/women_dropdown.jpg" alt="" height="200px" width="250px">
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown megamenu-fw">
                            <a href="{{ URL::to('/') }}/user_kids" class="nav-link dropdown-toggle arrow" data-toggle="dropbtn">KIDS</a>
                            <ul class="dropdown-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">SHOES</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="{{ URL::to('/') }}/kids_type_shoes/{{ urlencode($kids_arry[0]) }}">Casual Shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/kids_type_shoes/{{ urlencode($kids_arry[1]) }}">Sports shoes</a></li>
                                                    <li><a href="{{ URL::to('/') }}/kids_type_shoes/{{ urlencode($kids_arry[2]) }}">Sneakers</a></li>
                                                    <li><a href="{{ URL::to('/') }}/kids_type_shoes/{{ urlencode($kids_arry[3]) }}">FlipFlops</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">SCHOOL SHOES</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="{{ URL::to('/') }}/kids_type_shoes/{{ urlencode($kids_arry[4]) }}">Girls</a></li>
                                                    <li><a href="{{ URL::to('/') }}/kids_type_shoes/{{ urlencode($kids_arry[5]) }}">Boys</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-menu col-md-3">
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <img src="{{ URL::to('/') }}/images/kids/kids_dropdown.jpg" alt="" height="200px" width="250px">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="{{ URL::to('/') }}/login">Login</a></li>
                        {{-- <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
					    </a></li> --}}
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>


    <script src="{{ URL::to('/') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ URL::to('/') }}/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ URL::to('/') }}/js/jquery.superslides.min.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap-select.js"></script>
    <script src="{{ URL::to('/') }}/js/inewsticker.js"></script>
    <script src="{{ URL::to('/') }}/js/bootsnav.js."></script>
    <script src="{{ URL::to('/') }}/js/images-loded.min.js"></script>
    <script src="{{ URL::to('/') }}/js/isotope.min.js"></script>
    <script src="{{ URL::to('/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ URL::to('/') }}/js/baguetteBox.min.js"></script>
    <script src="{{ URL::to('/') }}/js/form-validator.min.js"></script>
    <script src="{{ URL::to('/') }}/js/contact-form-script.js"></script>
    <script src="{{ URL::to('/') }}/js/custom.js"></script>

    @yield('content')

     <!-- Start Footer  -->
<footer style="width: 100%">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-widget">
                        <h4>About TheBrand</h4>
                        <p>"Welcome to TheBrand, your go-to destination for the latest and greatest in footwear fashion. We're dedicated to providing you with a wide selection of stylish and comfortable shoes, so you can step out in confidence. Our commitment to quality, affordability, and exceptional customer service sets us apart. Explore our extensive collection, find your perfect pair, and elevate your style today with TheBrand."
                            </p>
                        <ul>
                            {{-- <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="{{ URL::to('/') }}/user_index">Home</a></li>
                            <li><a href="{{ URL::to('/') }}/user_men">Men</a></li>
                            <li><a href="{{ URL::to('/') }}/user_women">Women</a></li>
                            <li><a href="{{ URL::to('/') }}/user_kids">Kids</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4>Contact Us</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: "TheBrand Gondal <br>
                                    123 Shoe Street, <br>
                                    Gondal City, Rajkot District, <br>
                                    Gujarat, India - 360311" </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+919727428844">+91 9727428844</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="thebrandinfo@gmail.com">thebrandinfo@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->
</body>

</html>