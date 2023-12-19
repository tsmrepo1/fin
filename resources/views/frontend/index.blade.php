@extends('layouts.app')

@section('content')
<div class="main__body__wrapp">
    <div class="header__banner__main">
        <div class="theme_carousel owl-theme owl-carousel" data-options='{"margin": 25, "autoheight":true, "lazyload":true, "nav":false, "dots":false, "autoplay":false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
            @foreach($banners as $banner)
            <div class="slide-item">
                <div class="image__box">

                        <img src="{{ asset(Storage::url($banner['banner_img'])) }}" alt="" />
                  
                </div>
                <div class="banner__content">
                    <div class="container">
                        <div class="col-lg-5 col-md-12 col-sm-12 p-0">
                            <h1>{{$banner['banner_title']}}</h1>
                            <a target="_blank" href="{{$banner['banner_link']}}" class="get__star">Get started Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="coun__wrapp">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>4000</h2>
                    <p>Students & Delegates</p>
                </div>
                <div class="col">
                    <h2>4000</h2>
                    <p>Students & Delegates</p>
                </div>
                <div class="col">
                    <h2>4000</h2>
                    <p>Students & Delegates</p>
                </div>
                <div class="col">
                    <h2>4000</h2>
                    <p>Students & Delegates</p>
                </div>
                <div class="col">
                    <h2>4000</h2>
                    <p>Students & Delegates</p>
                </div>
                <div class="col">
                    <h2>4000</h2>
                    <p>Students & Delegates</p>
                </div>
            </div>
        </div>
    </div>

    @foreach($records as $record)
    <div class="professional__ertification">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{ $record->name }}</h2>
                </div>
                <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 25, "autoheight":true, "lazyload":true, "nav":false, "dots":true, "autoplay":true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "2" } , "767" :{ "items" : "2" } , "1000":{ "items" : "4" }}}'>
                    @foreach($record->courses as $course)
                    <div class="slide-item">
                        <div class="course-card position-relative">
                            <div class="course-card__main">
                                <div class="image__box">
                                    <a href="#" class="ms-auto">
                                        <img src="{{ asset(Storage::url($course->thumbnail)) }}" alt="" />
                                    </a>
                                </div>
                                <div class="banner__content">
                                    <div class="container">
                                        <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                            <a href="#">
                                                <h3>
                                                    {{ $course->title }}
                                                </h3>
                                                <p>Havard University</p>
                                                <span class="rating d-flex">
                                                    <span>4.4</span>
                                                    <span class="star__wrapp">
                                                        <img src="{{ asset('assets/frontend/images/star.png') }}" alt="" />
                                                    </span>
                                                </span>
                                                <h4 class="free__wrapp">{{ $course->price_type == "FREE" ? "FREE" : '$'.$course->sale_price }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-card__outer py-4">
                                <div class="inner-block">
                                    <h3>{{ $course->title }}</h3>
                                    <p>
                                        {{ $course->subtitle }}
                                    </p>
                                    <ul>
                                        <?php $arr = json_decode($course->things_to_learn); ?>

                                        @if($arr)
                                        @foreach($arr as $data)
                                        <li>{{ $data }}</li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    <div class="addtocart__wrapp">
                                        <a href="javascript:void(0)" class="cart" data-id="{{$course->id}}">Add To Cart</button>
                                            <a href="javascript:void(0)" class="heart" data-id="{{$course->id}}"><i class=" fa-regular fa-heart"></i></a>
                                            <a href="{{ route('course.single', $course->id) }}" class="heart"><i class="fa-solid fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="become__an__instructor">
        <div class="col-sm-12">
            <h2>Become an instructor</h2>
        </div>
        <div class="row m-0 p-0">
            <div class="col-sm-6 p-0">
                <div class="text__holder">
                    <img src="{{ asset('assets/frontend/images/logo_1.png') }}" alt="" />
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
                        ipsum suspendisse ultrices gravida. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit
                    </p>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
                        ipsum suspendisse ultrices gravida. Risus commodo viverra
                        maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit
                    </p>
                    <a href="#">Start teaching today</a>
                </div>
            </div>

            <div class="col-sm-6 p-0">
                <div class="text__holderright">
                    <div class="im__holder d-flex">
                        <img src="{{ asset('assets/frontend/images/all_1.png') }}" alt="" class="f-image" />
                        <img src="{{ asset('assets/frontend/images/all_1.png') }}" alt="" />
                    </div>
                    <div class="im__holder d-flex">
                        <img src="{{ asset('assets/frontend/images/all_1.png') }}" alt="" class="f-image" />
                        <img src="{{ asset('assets/frontend/images/all_1.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map__holder">
        <div class="row m-0 p-0">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 m-0 p-0">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14736.221804284312!2d88.48880994999999!3d22.577029300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1661941179011!5m2!1sen!2sin" width="100%" height="708" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 m-0 p-0 get">
                <div class="form__wrapp">
                    <h2>get in touch</h2>

                    <form action="" class="f-all">
                        <div class="row">
                            <div class="col-sm-6 mb-5">
                                <p>Select region/country</p>
                                <select name="" id=""></select>
                            </div>
                            <div class="col-sm-6 mb-5">
                                <p>Select region/country</p>
                                <select name="" id=""></select>
                            </div>

                            <div class="col-sm-12">
                                <textarea></textarea>
                            </div>

                            <div class="col-sm-12">
                                <input type="submit" name="" id="" value="SUBMIT" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).on("click", ".cart", function(event) {
        event.preventDefault()
        let id = $(this).data("id")
        console.log(id)

        fetch(`{{url("add_cart")}}/${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    alert("Course added to the cart")
                } else {
                    alert(data.message)
                }
            })
    })
</script>
@stop