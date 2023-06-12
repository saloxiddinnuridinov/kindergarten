<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sikkha</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('template/img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/responsive.css')}}">
</head>

<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<header id="home">
    <div class="header-area">
        <!-- header-top -->
        <div class="header-top primary-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="header-contact-info d-flex">
                            <div class="header-contact header-contact-phone">
                                <span class="ti-headphone"></span>
                                <p class="phone-number">+998942440523</p>
                            </div>
                            <div class="header-contact header-contact-email">
                                <span class="ti-email"></span>
                                <p class="email-name">support@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="header-social-icon-list">
                            <ul>
                                <li><a href="#"><span class="ti-facebook"></span></a></li>
                                <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                                <li><a href="#"><span class="ti-dribbble"></span></a></li>
                                <li><a href="#"><span class="ti-google"></span></a></li>
                                <li><a href="#"><span class="ti-pinterest"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /end header-top -->
        <!-- header-bottom -->
        <div class="header-bottom-area header-sticky" style="transition: .6s;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                        <div class="logo">
                            <a href="{{route('boshSahifa')}}">
                                <img src="{{asset('template/img/logo/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-6 col-6">
                        <div class="header-bottom-icon f-right">
                            <ul>
                                <li class="toggle-search-icon"><a href="#"><span class="ti-search"></span>
                                        <div class="toggle-search-box">
                                            <form action="{{url('search')}}" method="get" id="searchbox">
                                                <input placeholder="Search" type="text">
                                                <button name="q" type="submit" class="button-search"><span class="ti-search"></span></button>
                                            </form>
                                        </div>
                                    </a>

                                </li>
                                <li class="shopping-cart"><a href="#"><span class="ti-shopping-cart"></span>
                                        <span class="shopping-counter">0</span>
                                    </a></li>
                            </ul>
                        </div>

                        <div class="main-menu f-right">
                            <nav id="mobile-menu" style="display: block;">
                                <ul>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /end header-bottom -->
    </div>
</header>


@yield('main')


{{--Pastgi qism uchun--}}


<div class="brand-area pt-80 pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="brand-list">
                    <ul>
                        <li><img src="template/img/brand/brand1.png" alt=""></li>
                        <li><img src="template/img/brand/brand2.png" alt=""></li>
                        <li><img src="template/img/brand/brand3.png" alt=""></li>
                        <li><img src="template/img/brand/brand4.png" alt=""></li>
                        <li><img src="template/img/brand/brand5.png" alt=""></li>
                        <li><img src="template/img/brand/brand6.png" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand end -->
<!-- subscribe start -->
<div class="subscribe-area">
    <div class="container">
        <div class="subscribe-box">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-7 col-md-8">
                            <div class="subscribe-text">
                                <h1>Subscribe</h1>
                                <span>Enter your email and get latest updates and offers subscribe us</span>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-4 justify-content-end">
                            <div class="email-submit-form">
                                <div class="subscribe-form">
                                    <form action="#">
                                        <input placeholder="Enter your email" type="email">
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- subscribe end -->
<!-- footer start -->
<footer id="Contact">
    <div class="footer-area primary-bg pt-150">
        <div class="container">
            <div class="footer-top pb-35">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-logo">
                                <img src="template/img/logo/logo_2.png" alt="">
                            </div>
                            <div class="footer-para">
                                <p>Sorem ipsum dolor sit amet conse ctetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nostrud exercition ullamco laboris nisi </p>
                            </div>
                            <div class="footer-socila-icon">
                                <span>Follow Us</span>
                                <div class="footer-social-icon-list">
                                    <ul>
                                        <li><a href="#"><span class="ti-facebook"></span></a></li>
                                        <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                                        <li><a href="#"><span class="ti-dribbble"></span></a></li>
                                        <li><a href="#"><span class="ti-google"></span></a></li>
                                        <li><a href="#"><span class="ti-pinterest"></span></a></li>
                                        <li><a href="#"><span class="ti-instagram"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-heading">
                                <h1>Quick Links</h1>
                            </div>
                            <div class="footer-menu clearfix">
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Condition</a></li>
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Consultation</a></li>
                                    <li><a href="#">Team Member</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Who we are</a></li>
                                    <li><a href="#">Get a Quote</a></li>
                                    <li><a href="#">Recent Post</a></li>
                                    <li><a href="#">Who we are</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 d-lg-none d-xl-block col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-heading">
                                <h1>Recent Post</h1>
                            </div>
                            <div class="recent-post d-flex mb-25">
                                <div class="recent-post-thumb">
                                    <img src="template/img/post/recent_post1.jpg" alt="">
                                </div>
                                <div class="recent-post-text">
                                    <p>Neque porro quisquam est qui dolorem ipsum</p>
                                    <div class="footer-time">
                                        <span class="ti-time"></span>
                                        <span class="footer-published-time">05 May 2018</span>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-post d-flex">
                                <div class="recent-post-thumb">
                                    <img src="template/img/post/recent_post1.jpg" alt="">
                                </div>
                                <div class="recent-post-text">
                                    <p>Neque porro quisquam est qui dolorem ipsum</p>
                                    <div class="footer-time">
                                        <span class="ti-time"></span>
                                        <span class="footer-published-time">05 May 2018</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4  col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-heading">
                                <h1>Contact Us</h1>
                            </div>
                            <div class="footer-contact-list">
                                <div class="single-footer-contact-info">
                                    <span class="ti-headphone "></span>
                                    <span class="footer-contact-list-text">+003 (1234) 7894</span>
                                </div>
                                <div class="single-footer-contact-info">
                                    <span class="ti-email "></span>
                                    <span class="footer-contact-list-text">youremail@gmail.com</span>
                                </div>
                                <div class="single-footer-contact-info">
                                    <span class="ti-location-pin"></span>
                                    <span class="footer-contact-list-text">123 New Street, 6th Floor, New York</span>
                                </div>
                            </div>
                            <div class="opening-time">
                                <span>Opening Hour</span>
                                <span class="opening-date">
                                        Sun - Sat : 10:00 am - 05:00 pm
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-25 pb-25">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-copyright text-center">
                                <span><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->


<script src="{{asset('template/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('template/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('template/js/popper.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('template/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('template/js/one-page-nav-min.js')}}"></script>
<script src="{{asset('template/js/slick.min.js')}}"></script>
<script src="{{asset('template/js/ajax-form.js')}}"></script>
<script src="{{asset('template/js/wow.min.js')}}"></script>
<script src="{{asset('template/js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('template/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('template/js/jquery.barfiller.js')}}"></script>
<script src="{{asset('template/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('template/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('template/js/waypoints.min.js')}}"></script>
<script src="{{asset('template/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('template/js/plugins.js')}}"></script>
<script src="{{asset('template/js/main.js')}}"></script>
</body>


</html>
