<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class navbar_middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <!-- Basic -->
        
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        
            <!-- Mobile Metas -->
            <meta name='viewport' content='width=device-width, initial-scale=1'>
        
            <!-- Site Metas -->
            <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
            <meta name='keywords' content=''>
            <meta name='description' content=''>
            <meta name='author' content=''>
        
            <!-- Site Icons -->
            <link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'>
            <link rel='apple-touch-icon' href='images/apple-touch-icon.png'>
        
            <!-- Bootstrap CSS -->
            <link rel='stylesheet' href='css/   bootstrap.css'>
            <link rel='stylesheet' href='css/bootstrap.min.css'>
            <!-- Site CSS -->
            <link rel='stylesheet' href='css/style.css'>
            <!-- Responsive CSS -->
            <link rel='stylesheet' href='css/responsive.css'>
            <!-- Custom CSS -->
            <link rel='stylesheet' href='css/custom.css'>
        
            {{-- [if lt IE 9]>
              <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
              <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
            <![endif] --}}
        
        </head>
        
        <body>
        
        
            <!-- Start Main Top -->
            <header class='main-header'>
                <!-- Start Navigation -->
                <nav class='navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav'>
                    <div class='container'>
                        <!-- Start Header Navigation -->
                        <div class='navbar-header'>
                            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbar-menu' aria-controls='navbars-rs-food' aria-expanded='false' aria-label='Toggle navigation'>
                            <i class='fa fa-bars'></i>
                        </button>
                            <a class='navbar-brand' href='index.html'><span style='font-family: Georgia, 'Times New Roman', Times, serif; color:black; font-size:40px;'>C</span><span style='font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color:cadetblue;font-size:30px;'>ampus</span></a>
                        </div>
                        <!-- End Header Navigation -->
        
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class='collapse navbar-collapse' id='navbar-menu'>
                            <ul class='nav navbar-nav ml-auto' data-in='fadeInDown' data-out='fadeOutUp'>
                                <li class='nav-item active'><a class='nav-link' href='index.html'>Home</a></li>
                                {{-- <li class='nav-item'><a class='nav-link' href='about.html'>About Us</a></li> --}}
                                <li class='dropdown megamenu-fw'>
                                    <a href='#' class='nav-link dropdown-toggle arrow' data-toggle='dropbtn'>MEN</a>
                                    <ul class='dropdown-content' role='menu'>
                                        <li>
                                            <div class='row'>
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SHOES</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>Running Shoes</a></li>
                                                            <li><a href='shop.html'>Walking Shoes</a></li>
                                                            <li><a href='shop.html'>Casual Shoes</a></li>
                                                            <li><a href='shop.html'>Sports shoes</a></li>
                                                            <li><a href='shop.html'>Sneakers</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SANDALS & FLOATERS</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>Casual</a></li>
                                                            <li><a href='shop.html'>Sports</a></li>
                                                            <li><a href='shop.html'>Clogs</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SLIPPERS</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>FlipFlops</a></li>
                                                            <li><a href='shop.html'>Slides</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class='col-menu col-md-3'>
                                                    <img src='images/about-img.jpg' alt='' height='200px' width='250px'>
                                                </div>
                                                <!-- end col-3 -->
                                            </div>
                                            <!-- end row -->
                                        </li>
                                    </ul>
                                </li>
                                <li class='dropdown megamenu-fw'>
                                    <a href='#' class='nav-link dropdown-toggle arrow' data-toggle='dropbtn'>WOMEN</a>
                                    <ul class='dropdown-content' role='menu'>
                                        <li>
                                            <div class='row'>
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SHOES</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>Running Shoes</a></li>
                                                            <li><a href='shop.html'>Walking Shoes</a></li>
                                                            <li><a href='shop.html'>Casual Shoes</a></li>
                                                            <li><a href='shop.html'>Sports shoes</a></li>
                                                            <li><a href='shop.html'>Sneakers</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SANDALS & FLOATERS</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>Casual</a></li>
                                                            <li><a href='shop.html'>Sports</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SLIPPERS</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>FlipFlops</a></li>
                                                            <li><a href='shop.html'>Slides</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class='col-menu col-md-3'>
                                                    <img src='images/about-img.jpg' alt='' height='200px' width='250px'>
                                                </div>
                                                <!-- end col-3 -->
                                            </div>
                                            <!-- end row -->
                                        </li>
                                    </ul>
                                </li>
                                <li class='dropdown megamenu-fw'>
                                    <a href='#' class='nav-link dropdown-toggle arrow' data-toggle='dropbtn'>KIDS</a>
                                    <ul class='dropdown-content' role='menu'>
                                        <li>
                                            <div class='row'>
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SHOES</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>Casual Shoes</a></li>
                                                            <li><a href='shop.html'>Sports shoes</a></li>
                                                            <li><a href='shop.html'>Sneakers</a></li>
                                                            <li><a href='shop.html'>Slip on Shoes</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SANDALS & FLOATERS</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>Casual</a></li>
                                                            <li><a href='shop.html'>Sports</a></li>
                                                            <li><a href='shop.html'>FlipFlops</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end col-3 -->
                                                <div class='col-menu col-md-3'>
                                                    <h6 class='title'>SCHOOL SHOES</h6>
                                                    <div class='content'>
                                                        <ul class='menu-col'>
                                                            <li><a href='shop.html'>Girls</a></li>
                                                            <li><a href='shop.html'>Boys</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                        
                                                <!-- end col-3 -->
                                                <div class='col-menu col-md-3'>
                                                    <img src='images/about-img.jpg' alt='' height='200px' width='250px'>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li>
                                    </ul>
                                </li>
                                {{-- <li class='nav-item'><a class='nav-link' href='service.html'>Our Service</a></li> --}}
                                <li class='nav-item'><a class='nav-link' href='contact-us.html'>Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
        
                        <!-- Start Atribute Navigation -->
                        <div class='attr-nav'>
                            <ul>
                                <li class='search'><a href='login'><i class='fa fa-user'></i></a></li>
                                <li class='side-menu'><a href='#'>
                                <i class='fa fa-shopping-bag'></i>
                                    <span class='badge'>3</span>
                                </a></li>
                            </ul>
                        </div>
                        <!-- End Atribute Navigation -->
                    </div>
                </nav>
                <!-- End Navigation -->
            </header>
            
    <a href='#' id='back-to-top' title='Back to top' style='display: none;'>&uarr;</a>

    <!-- ALL JS FILES -->
    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <!-- ALL PLUGINS -->
    <script src='js/jquery.superslides.min.js'></script>
    <script src='js/bootstrap-select.js'></script>
    <script src='js/inewsticker.js'></script>
    <script src='js/bootsnav.js.'></script>
    <script src='js/images-loded.min.js'></script>
    <script src='js/isotope.min.js'></script>
    <script src='js/owl.carousel.min.js'></script>
    <script src='js/baguetteBox.min.js'></script>
    <script src='js/form-validator.min.js'></script>
    <script src='js/contact-form-script.js'></script>
    <script src='js/custom.js'></script>
</body>";
        return $next($request);
    }
}
