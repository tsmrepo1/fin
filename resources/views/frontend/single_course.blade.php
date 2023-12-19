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
                    <h1>{{ $course->title }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="br-wrapp">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <h3>AJAX Development</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="what__you__wrapp">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="holder__wrapp">
                        <h3>What you'll learn</h3>
                        <?php
                        $things_to_learn = json_decode($course->course_meta->things_to_learn);
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul>
                                    <?php for ($i = 0; $i < count($things_to_learn) / 2; $i++) { ?>
                                        <li><?php echo $things_to_learn[$i] ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul>
                                    <?php for ($i = count($things_to_learn) / 2; $i < count($things_to_learn); $i++) { ?>
                                        <li><?php echo $things_to_learn[$i] ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="course__content">
                        <h3>Course content</h3>
                        <p class="d-none">7 sections • 23 lectures • 2h 58m total length</p>

                        <div class="accordion" id="accordionExample">
                            @foreach($course->chapters as $chapter)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{$chapter->title}}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach($chapter->lessons as $lesson)
                                            <li>{{ $lesson->title }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="left__box">
                        <a href="#">
                            <img src="{{asset('assets/frontend/images/im_2.png')}}" alt="" />
                        </a>
                        @if($course->price_type == "FREE")
                        <h3>FREE</h3>
                        @endif

                        @if($course->price_type == "PAID")
                        <h3>${{ $course->sale_price }}</h3>
                        @endif

                        @if($course->price_type == "FREE")
                        <div class="butto__wrapp">
                            <a href="{{route('enroll', $course->id)}}" class="buy__wrapp">Enroll now</a>
                        </div>
                        @endif

                        @if($course->price_type == "PAID")
                        <div class="butto__wrapp">
                            <a href="#">Add to cart</a>
                            <a href="{{route('checkout', $course->id)}}" class="buy__wrapp">Buy now</a>
                        </div>
                        @endif


                        <h4>This course includes:</h4>
                        <ul>
                            <li>Full lifetime access</li>
                            <li>Access on mobile and TV</li>
                            <li>Certificate of completion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="reg__wrapp">
        <div class="container">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            Requirements
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                            Description
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @foreach(json_decode($course->course_meta->requirements) as $requirement)
                        <li>{{ $requirement }}</li>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container free">
        <div class="row">
            <h2>FREE courses</h2>
            <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 25, "autoheight":true, "lazyload":true, "nav":true, "dots":false, "autoplay":true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "2" } , "767" :{ "items" : "2" } , "1000":{ "items" : "4" }}}'>
                <div class="slide-item">
                    <div class="image__box">
                        <a href="#" class="ms-auto">
                            <img src="assets/images/freeall.png" alt="" />
                        </a>
                    </div>
                    <div class="banner__content">
                        <div class="container">
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                <a href="#">
                                    <h3>Trainings on digital financial Ecosystem</h3>
                                    <p>Edwin Diaz,Coding Solutions</p>
                                    <span class="rating d-flex">
                                        <span>4.4</span>
                                        <span class="star__wrapp">
                                            <img src="assets/images/star.png" alt="" />
                                        </span>
                                    </span>
                                    <h4 class="free__wrapp">FREE</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop