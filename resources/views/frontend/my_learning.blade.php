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
                    <h1>My<span>Learning</span></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="what__you__wrapp">
        <div class="container">
            <div class="row">
                <h3>All Courses</h3>
                @foreach($courses as $course)
                <div class="col-sm-3">
                    <div class="image__box content">
                        <a href="{{ route('study.learn', $course->id) }}" class="ms-auto">
                            <div class="content-overlay"></div>
                            <img src="{{ asset(Storage::url($course->thumbnail)) }}" alt="" class="content-image" />
                            <div class="content-details fadeIn-bottom d-none">
                                <h3 class="content-title"><i class="fa-solid fa-circle-play"></i></h3>
                            </div>
                        </a>
                    </div>
                    <div class="banner__content">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                <a href="{{ route('study.learn', $course->id) }}">
                                    <h3>{{ $course->title }}</h3>

                                    <p class="mb-0">
                                        Duration: 2hours
                                    </p>
                                    <div class="progress mt-3" role="progressbar" aria-label="Example 1px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 1px">
                                        <div class="progress-bar" style="width: 25%"></div>
                                    </div>
                                    <div class="com__holder">
                                        <p>5% complete</p>
                                    </div>
                                    <span class="rating d-flex">
                                        <span class="star__wrapp">
                                            <img src="assets/images/star.png" alt="" />
                                        </span>
                                    </span>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div class="container">
            <div class="row">
                <h3>Wishlist</h3>
                @foreach($courses as $course)
                <div class="col-sm-3">
                    <div class="image__box content">
                        <a href="{{ route('study.learn', $course->id) }}" class="ms-auto">
                            <div class="content-overlay"></div>
                            <img src="{{ asset(Storage::url($course->thumbnail)) }}" alt="" class="content-image" />
                            <div class="content-details fadeIn-bottom d-none">
                                <h3 class="content-title"><i class="fa-solid fa-circle-play"></i></h3>
                            </div>
                        </a>
                    </div>
                    <div class="banner__content">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                <a href="{{ route('study.learn', $course->id) }}">
                                    <h3>{{ $course->title }}</h3>

                                    <p class="mb-0">
                                        Duration: 2hours
                                    </p>
                                    <div class="progress mt-3" role="progressbar" aria-label="Example 1px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 1px">
                                        <div class="progress-bar" style="width: 25%"></div>
                                    </div>
                                    <div class="com__holder">
                                        <p>5% complete</p>
                                    </div>
                                    <span class="rating d-flex">
                                        <span class="star__wrapp">
                                            <img src="assets/images/star.png" alt="" />
                                        </span>
                                    </span>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop