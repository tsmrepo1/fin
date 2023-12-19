<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FINTEKIN | Index</title>

    <link href=" {{asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href=" {{asset('assets/css/custom-style.css')}} " rel="stylesheet" />
    <link href=" {{asset('assets/css/owl.css')}} " rel="stylesheet" />
    <link href=" {{asset('assets/css/responsive.css')}} " rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" sizes="32x32" />
</head>

<body>
    <div class="top__header top__header__container d-flex">
        <div class="logo__wrapp">
            <a href="index.php">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" />
            </a>
        </div>
        <div class="top__header__rightwrapp ms-auto">
            <div class="search__wrapp">
                <input type="text" value="" placeholder="Search courses Here" />
                <input type="submit" name="" id="" />
            </div>
            <div class="holder__phone">
                <div class="account__wwrapp">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/account.png') }}" />
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="login.php">Login</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="register.php">Register</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="myprofile.php">My Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="cart__wrapp">
                    <a href="#">
                        <img src="{{ asset('assets/images/cart.png') }}" alt="" />
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
    <nav class="navbar navbar-expand-lg static-top">
        <a href="#" class="gear">
            <i class="fa-solid fa-gear"></i>
        </a>
        <div class="container main__header__content">
            <button class="navbar-toggler navbar-toggler-right hamburger-menu order-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li>
                        <a href="productlist.php">Platform</a>
                    </li>
                    <li>
                        <a href="productlist.php">Individuals</a>
                    </li>
                    <li>
                        <a href="productlist.php">Startups/Businesses</a>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="productlist.php">Services</a>
                    </li>
                    <li>
                        <a href="productlist.php">Government </a>
                    </li>
                    <li>
                        <a href="productlist.php">Resources I Teach on FintekIn</a>
                    </li>
                </ul>
            </div>
            <div class="contact__info">
                <div class="phone__wrapp">
                    <a href="contact.php" class="justify-content-between">
                        <div class="num__wrapp">
                            <span>Join Now</span>
                        </div>
                        <div class="icon__box">
                            <img src="{{ asset('assets/images/send.png') }}" alt="" />
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="main__body__wrapp">
        <div class="header__banner__main header__banner__inner">
            <div class="image__box">
                <img alt="" src="{{ asset('assets/images/innerbanner.jpg') }}" />
            </div>
            <div class="banner__content">
                <div class="container">
                    <div class="row">
                        <h1>Log<span>In</span></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="what__you__wrapp">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-11 col-xl-10 col-xxl-9">
                        <div class="form-container form-container--login row box-shadow border-radius--custom mx-1 mx-md-0">
                            <div class="col-12 col-md-12 col-lg-6 form-container__img-col d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/images/login-illustration.svg') }}" alt="Login Illustration" />
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 form-container__content-col px-3 py-4 p-md-4 p-lg-5 bg--white">
                                <h4 class="text--heading font--serif mb-4">Login</h4>
                                <form action="#" class="form login-form" id="loginForm">
                                    <div class="form__field">
                                        <input type="text" name="l_email" class="form__input" required="" placeholder="Email" />
                                    </div>
                                    <div class="form__field mb-4">
                                        <input type="password" name="l_password" class="form__input" required="" placeholder="Password*" />
                                    </div>
                                    <button type="submit" class="button button-primary d-block w-100">
                                        Login
                                    </button>
                                </form>
                                <p class="text--para mt-3 mb-0 text-center">
                                    Don't have an account?
                                    <a href="register.php" class="redirecting-link--register fw-semibold text-decoration-underline">Register
                                        Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('content')

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
                            <a href="#"><img src="assets/images/footer_logo.png" alt="" /></a>
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
                                    <a href="#">Partners</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
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
                        <img src="assets/images/account.png" />
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
                    <img src="assets/images/cart.png" alt="" />
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

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2d537fef4a.js" crossorigin="anonymous"></script>
    <script src="assets/js/core.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        (function() {
            $(".hamburger-menu").on("click", function() {
                $(".bar").toggleClass("animate");
            });
        })();
    </script>
</body>

</html>