<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FINTEKIN | Index</title>

    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/frontend/css/custom-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/frontend/css/owl.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/frontend/css/responsive.css') }} " rel="stylesheet" />
    <link rel='stylesheet' href="{{ asset('assets/frontend/css/autocomplete.css') }} ">
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.png') }}" sizes="32x32" />
    <style>
        .disabled-link {
            pointer-events: none;
            /* Disable pointer events */
            color: #999;
            /* Change color to visually indicate it is disabled */
            text-decoration: none;
            /* Optionally remove underline */
            /* Additional styles to visually indicate a disabled link */
        }
    </style>
</head>

<body>
    <div class="top__header top__header__container d-flex">
        <div class="logo__wrapp">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="" />
            </a>
        </div>
        <div class="top__header__rightwrapp ms-auto">
            <!-- search holder -->
            <div id="autocomplete" class="autocomplete">
                <input class="autocomplete-input" placeholder="Search Wikipedia" aria-label="Search Wikipedia">
                <ul class="autocomplete-result-list"></ul>
            </div>
            <!-- search holder end -->
            <div class="holder__phone">
                <div class="account__wwrapp">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/frontend/images/account.png') }}" />
                        </button>
                        <ul class="dropdown-menu">
                            @if(!Auth::check())
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                            </li>
                            @endif

                            @if(Auth::check())
                            <li>
                                <a class="dropdown-item" href="{{ route('my_courses') }}">My Learning</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="myprofile.php">My Cart</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="myprofile.php">Wishlist</a>
                            </li>
                            @php

                            $mid = DB::table('instructorregistration')->where('user_id',auth()->user()->id)->get();

                            $prec = $mid->count();
                            if($prec==1){
                            $stst = $mid->first()->status;
                            }


                            @endphp
                            <?php if (($prec == 1) && ($stst == 1)) { ?>
                                <li>
                                    <a class="dropdown-item" href="{{ route('beainstructors') }}">Instructor Dashboard</a>
                                </li>
                            <?php } elseif ($prec == 0) { ?>

                                <li>
                                    <a class="dropdown-item" href="{{ route('be.instructor') }}">Become an Instructor</a>
                                </li>
                            <?php } elseif (($prec == 1) && ($stst == 2)) { ?>

                                <li>
                                    <a class="dropdown-item" href="{{ route('instructor.dashboard') }}">Instructor Dashboard</a>
                                </li>
                            <?php } ?>
                            <li>
                                <a class="dropdown-item" href="myprofile.php">Notification</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="myprofile.php">Messages</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="myprofile.php">Account Setting</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="myprofile.php">Help & Support</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="javascript:;" onclick="parentNode.submit();">Logout</a>
                                </form>
                            <li>
                                @endif
                        </ul>
                    </div>
                </div>
                <div class="cart__wrapp">
                    <a href="{{ route('cart') }}">
                        <img src="{{ asset('assets/frontend/images/cart.png') }}" alt="" />
                        <span>0</span>
                    </a>
                </div>
                <div class="account__wwrapp langu">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ENG
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">eng</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--====== Sidebar ======-->
    <aside id="sidebar">


        <div class="sidebar_content sidebar_body">
            <nav class="side_navlinks">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>

    </aside>

    <!--== Sidebar-Toggler ==-->
    <div class="sidebar_toggler">
        <span></span>
        <span></span>
        <span> </span>


    </div>
    <div class="gear">
        <i class="fa-solid fa-gear"></i>
    </div>
    <nav class="navbar navbar-expand-lg static-top">

        <div class="container main__header__content">
            <button class="navbar-toggler navbar-toggler-right hamburger-menu order-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    @foreach($menus['category'] as $menu)
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="productlist.php">{{$menu['title']}}</a>
                        <ul class="dropdown-menu">
                            @foreach($menu['subcat'] as $subcat)
                            <li><a href="#">{{$subcat['sub_title']}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="contact__info">
                <div class="phone__wrapp">
                    <a href="{{ route('register') }}" class="justify-content-between">
                        <div class="num__wrapp">
                            <span>Join Now</span>
                        </div>
                        <div class="icon__box">
                            <img src="{{ asset('assets/frontend/images/send.png') }}" alt="" />
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="address__wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="map__holderone">
                            <div class="location__holder">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="address__wrap">
                                <p>Lorem ipsum dolor sit amet - 403517, India</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="map__holderone">
                            <div class="location__holder">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="address__wrap">
                                <a href="#">ipsumdolor@intekin.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="map__holderone">
                            <div class="location__holder">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="address__wrap">
                                <a href="#">1234 6547 9874</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mid__holder">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 offset-1">
                        <div class="footer__box">
                            <a href="#"><img src="assets/frontend/images/footer_logo.png" alt="" /></a>
                            <div class="subcri__wrapper">
                                <p>Sign Up Our Newsleatter</p>
                                <input type="text" name="" placeholder="Your Email" />
                                <input type="submit" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2 offset-1">
                        <div class="footer__box">
                            <ul>
                                <li>
                                    <a href="#">What's new</a>
                                </li>
                                <li>
                                    <a href="#">New Courses</a>
                                </li>
                                <li>
                                    <a href="#">Partners</a>
                                </li>
                                <li>
                                    <a href="#">Terms of Use</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="footer__box">
                            <ul>
                                <li>
                                    <a href="#">Our Team</a>
                                </li>
                                <li>
                                    <a href="#">Course Catalog</a>
                                </li>
                                <li>
                                    <a href="#">License Our Content</a>
                                </li>
                                <li>
                                    <a href="#">Community</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="footer__box">
                            <ul>
                                <li>
                                    <a href="#">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Teach</a>
                                </li>
                                <li>
                                    <a href="{{ route('tc') }}">Terms & Conditions</a>
                                </li>
                                <li>
                                    <a href="{{ route('pp') }}">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="down__footer">
            © 2022 fintekin | designed by think surf media All Rights Reserved
        </div>
    </footer>

    <div class="footer__cart__wrapp">
        <div class="mobile-wrapp">
            <div class="account__wwrapp mobile-wrapp">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/frontend/images/account.png" />
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Action</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="cart__wrapp mobile-wrapp">
                <a href="#">
                    <img src="assets/frontend/images/cart.png" alt="" />
                    <span>0</span>
                </a>
            </div>
            <div class="account__wwrapp langu">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ENG
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">eng</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/2d537fef4a.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/frontend/js/core.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/autocomplete.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/autosearch.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/gear.js') }}"></script>
    <script>
        (function() {
            $(".hamburger-menu").on("click", function() {
                $(".bar").toggleClass("animate");
            });
        })();
    </script>
</body>

</html>