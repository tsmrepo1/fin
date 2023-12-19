@extends('layouts.app')

@section('content')
<div class="main__body__wrapp">
    <div class="ins__wrapp">
        <div class="container">
            <div class="row">
                <div class="ins__banner" style="background-image: url('{{asset('assets/frontend/images/billboard-desktop-v4.jpg')}}');">
                    <h2>Come teach with us</h2>
                    <p>Become an instructor and change lives — including your own</p>
                    <a href="{{route('reg.instructor')}}">Get started</a>
                </div>
                <div class="so__many">
                    <h2>So many reasons to start</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="box__two">
                                <img src="{{asset('assets/frontend/images/lecture.png')}}" alt="">
                                <h3>Teach your way</h3>
                                <p>Publish the course you want, in the way you want, and always have control of your own
                                    content.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box__two">
                                <img src="{{asset('assets/frontend/images/lecture.png')}}" alt="">
                                <h3>Teach your way</h3>
                                <p>Publish the course you want, in the way you want, and always have control of your own
                                    content.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box__two">
                                <img src="{{asset('assets/frontend/images/lecture.png')}}" alt="">
                                <h3>Teach your way</h3>
                                <p>Publish the course you want, in the way you want, and always have control of your own
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="We_just_keep_growing">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>We just keep growing</h2>
                    <p>Our global community and our course catalog get bigger every day.Check out our latest numbers
                        as of June 2023. </p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <div class="counter">

                        <h2 class="timer count-title count-number" data-to="100" data-speed="1500">100</h2>
                        <p class="count-text ">Learners</p>
                    </div>
                </div>
                <div class="col">
                    <div class="counter">

                        <h2 class="timer count-title count-number" data-to="1700" data-speed="1500">100</h2>
                        <p class="count-text ">Instructors</p>
                    </div>
                </div>
                <div class="col">
                    <div class="counter">

                        <h2 class="timer count-title count-number" data-to="11900" data-speed="1500">100</h2>
                        <p class="count-text ">Courses</p>
                    </div>
                </div>
                <div class="col">
                    <div class="counter">

                        <h2 class="timer count-title count-number" data-to="157" data-speed="1500">100</h2>
                        <p class="count-text ">Course enrollments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="begin__holder">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>How to begin</h2>
                </div>
                <div class="col-sm-10 m-auto">
                    <div class="tab__holder">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home">Plan your curriculum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu1">Record your video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu2">Launch your course</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <div class="tab__holder__inner">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <p>It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout. The point of
                                                using Lorem Ipsum is that it has a more-or-less normal distribution of
                                                letters, as opposed to using 'Content here, content here', making it
                                                look like readable English. Many desktop publishing packages and web
                                                page editors now use Lorem Ipsum as their default model text, and a
                                                search for 'lorem ipsum' will uncover many web sites still in their
                                                infancy. </p>

                                            <p>It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout. The point of
                                                using Lorem Ipsum is that it has a more-or-less normal distribution of
                                                letters, as opposed to using 'Content here, content here', making it
                                                look like readable English. Many desktop publishing packages and web
                                                page editors now use Lorem Ipsum as their default model text, and a
                                                search for 'lorem ipsum' will uncover many web sites still in their
                                                infancy. </p>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <img src="{{asset('assets/frontend/images/plan-your-curriculum-v3.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                <h3>Menu 1</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea commodo consequat.</p>
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                <h3>Menu 2</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo__wrappone">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 m-auto">
                    <h2 class="wont__holder">You won’t have to do it alone</h2>
                    <p>Our Instructor Support Team is here to answer your questions and review your test video, while
                        our Teaching Center gives you plenty of resources to help you through the process. Plus, get the
                        support of experienced instructors in our online community.</p>

                    <a href="#" class="need__holder">Need more details before you start? Learn more.</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop