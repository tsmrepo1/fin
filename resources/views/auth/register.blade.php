@extends('layouts.app')

@section('content')
<div class="main__body__wrapp">
    <div class="header__banner__main header__banner__inner">
        <div class="image__box">
            <img alt="" src="{{asset('assets/frontend/images/innerbanner.jpg')}}" />
        </div>
        <div class="banner__content">
            <div class="container">
                <div class="row">
                    <h1>Regi<span>ster</span></h1>
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
                            <img src="{{asset('assets/frontend/images/login-illustration.svg')}}" alt="Login Illustration" />
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 form-container__content-col px-3 py-4 p-md-4 p-lg-5 bg--white">
                            <h4 class="mb-4 register--holder">Register</h4>
                            <div class="row">
                                @if(count($errors) > 0)
                                <div class="col-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @foreach($errors as $error)
                                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                        @endforeach
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <form action="{{ route('register') }}" method="POST" class="form login-form" id="loginForm">
                                @csrf
                                <div class="form__field">
                                    <input type="text" name="name" class="form__input" required="" placeholder="Name" />
                                </div>
                                <div class="form__field">
                                    <input type="text" name="email" class="form__input" required="" placeholder="Email" />
                                </div>

                                <div class="form__field mb-4">
                                    <input type="password" name="password" class="form__input" required="" placeholder="Password*" />
                                </div>

                                <div class="form__field mb-4">
                                    <input type="password" name="password_confirmation" class="form__input" required="" placeholder="Confirm Password*" />
                                </div>

                                <button type="submit" class="button button-primary d-block w-100">
                                    Register
                                </button>
                            </form>
                            <p class="text--para mt-3 mb-0 text-center">
                                Already have an account?
                                <a href="{{ route('login') }}" class="redirecting-link--register fw-semibold text-decoration-underline">
                                    Login Now
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop