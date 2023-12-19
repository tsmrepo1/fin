@extends('layouts.app')

@section('content')
<form>@csrf</form>

<div class="main__body__wrapp">
    <div class="student__wrapp">
        <div class="student__progress__wrapp">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <h4>{{ $course->title }}</h4>
                        <p>{{ $course->subtitle }}</p>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <div class="student__dropdown__wrapp">
                            <div class="drop__student">
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="nav__image d-none">
                                            <h4>54%</h4>
                                        </div>
                                        <span>Your Progress <span id="progress"></span>%</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="share__wrapp">
                                <div class="share-button sharer" style="display: block;">
                                    <button type="button" class="btn share-btn">Share</button>
                                    <div class="social top center networks-5 ">
                                        <!-- Facebook Share Button -->
                                        <a class="fbtn share facebook" href="https://www.facebook.com/sharer/sharer.php?u=url"><i class="fa fa-facebook"></i></a>
                                        <!-- Google Plus Share Button -->
                                        <a class="fbtn share gplus" href="https://plus.google.com/share?url=url"><i class="fa fa-google-plus"></i></a>
                                        <!-- Twitter Share Button -->
                                        <a class="fbtn share twitter" href="https://twitter.com/intent/tweet?text=title&amp;url=url&amp;via=creativedevs"><i class="fa fa-twitter"></i></a>
                                        <!-- Pinterest Share Button -->
                                        <a class="fbtn share pinterest" href="https://pinterest.com/pin/create/button/?url=url&amp;description=data&amp;media=image"><i class="fa fa-pinterest"></i></a>

                                        <!-- LinkedIn Share Button -->
                                        <a class="fbtn share linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=url&amp;title=title&amp;source=url/"><i class="fa fa-linkedin"></i></a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="show__hide"><input type="button" value="Show/Hide" id="btnShowHide" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapp__holder">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="video__holder">
                        <iframe width="100%" height="600" src="<?php echo asset(Storage::url($lesson['content'])); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="tab__holder">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="qa-tab" data-bs-toggle="tab" data-bs-target="#qa" type="button" role="tab" aria-controls="contact" aria-selected="false">Q&A
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="qa" role="tabpanel" aria-labelledby="qa-tab">
                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        <button class="btn btn-dark" data-toggle="modal" data-target="#questionModal">Ask Question</button>
                                    </div>
                                </div>
                                <div class="search__wrapp mt-5 m-auto">
                                    <input type="text" value="" placeholder="Search courses Here">
                                    <input type="submit" name="" id="">
                                </div>

                                <h4 class="ques">Questions in This Course <span>()</span></h4>
                                <div class="box__all__question">
                                    <div class="profile__pic">
                                        <img src="assets/images/sg.png" alt="" />
                                    </div>
                                    <div class="review__text">
                                        <h3>sfsfs</h3>
                                        <p>asgasgsagas</p>
                                        <div class="nameone__holder">
                                            <h6><span>Asked by</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="px-1 py-5 mx-auto">
                                    <div class="justify-content-center">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-12 text-center mb-5">
                                            <div class="card">
                                                <div class="row justify-content-left d-flex">
                                                    <div class="col-md-4 d-flex flex-column">
                                                        <div class="rating-box">
                                                            <h1 class="pt-4">4.0</h1>
                                                            <p class="">out of 5</p>
                                                        </div>
                                                        <div> <span class="fa fa-star star-active mx-1"></span>
                                                            <span class="fa fa-star star-active mx-1"></span> <span class="fa fa-star star-active mx-1"></span> <span class="fa fa-star star-active mx-1"></span> <span class="fa fa-star star-inactive mx-1"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="rating-bar0 justify-content-center">
                                                            <table class="text-left mx-auto">
                                                                <tr>
                                                                    <td class="rating-label">Excellent</td>
                                                                    <td class="rating-bar">
                                                                        <div class="bar-container">
                                                                            <div class="bar-5"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">123</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="rating-label">Good</td>
                                                                    <td class="rating-bar">
                                                                        <div class="bar-container">
                                                                            <div class="bar-4"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">23</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="rating-label">Average</td>
                                                                    <td class="rating-bar">
                                                                        <div class="bar-container">
                                                                            <div class="bar-3"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">10</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="rating-label">Poor</td>
                                                                    <td class="rating-bar">
                                                                        <div class="bar-container">
                                                                            <div class="bar-2"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">3</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="rating-label">Terrible</td>
                                                                    <td class="rating-bar">
                                                                        <div class="bar-container">
                                                                            <div class="bar-1"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">0</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="d-flex">
                                                    <div class=""> <img class="profile-pic" src="https://i.imgur.com/V3ICjlm.jpg"> </div>
                                                    <div class="d-flex flex-column">
                                                        <h3 class="mt-2 mb-0">Mukesh Kumar</h3>
                                                        <div>
                                                            <p class="text-left"><span class="text-muted">4.0</span>
                                                                <span class="fa fa-star star-active ml-3"></span>
                                                                <span class="fa fa-star star-active"></span> <span class="fa fa-star star-active"></span> <span class="fa fa-star star-active"></span> <span class="fa fa-star star-inactive"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="ml-auto ms-lg-auto">
                                                        <p class="text-muted pt-5 pt-sm-3">10 Sept</p>
                                                    </div>
                                                </div>
                                                <div class="text-left text-start">
                                                    <h4 class="blue-text mt-3">"An awesome activity to experience"
                                                    </h4>
                                                    <p class="content">If you really enjoy spending your vacation
                                                        'on water' or would like to try something new and exciting
                                                        for the first time.</p>
                                                </div>
                                                <div class="row text-left"> <img class="pic" src="https://i.imgur.com/kjcZcfv.jpg"> <img class="pic" src="https://i.imgur.com/SjBwAgs.jpg"> <img class="pic" src="https://i.imgur.com/IgHpsBh.jpg"> </div>
                                                <div class="row text-left text-start mt-4">
                                                    <div class="like mr-3 vote"> <img src="https://i.imgur.com/mHSQOaX.png"><span class="blue-text pl-2">20</span> </div>
                                                    <div class="unlike vote"> <img src="https://i.imgur.com/bFBO3J7.png"><span class="text-muted pl-2">4</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="search__wrapp mt-5 m-auto d-none">
                                    <input type="text" value="" placeholder="Search courses Here">
                                    <input type="submit" name="" id="">
                                </div>
                                <h3 class="new__search">Start a new search</h3>
                                <p class="caption">To find captions, lectures or resources</p>
                            </div>

                            <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="overview__holder__wrapp">
                                    <h3>About this course</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                        ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                        facilisis.
                                    </p>
                                </div>
                                <div class="overview__holder__wrapp">
                                    <h3>About this course</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                        ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                        facilisis.
                                    </p>
                                </div>
                                <div class="overview__holder__wrapp">
                                    <h3>About this course</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                        ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                        facilisis.
                                    </p>
                                </div>
                                <div class="overview__holder__wrapp">
                                    <h3>About this course</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                        ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                        facilisis.
                                    </p>
                                </div>
                                <div class="overview__holder__wrapp">
                                    <h3>About this course</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                        ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                        facilisis.
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="announcements" role="tabpanel" aria-labelledby="announcements-tab">D
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4" id="divShowHide">
                    <div class="rightpanel__wrapp">
                        <h3>Course content</h3>
                        <div class="accordion" id="accordionExample">
                            @foreach($course->chapters as $chapter)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Section {{$loop->iteration}}: {{$chapter->title}}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @foreach($chapter->lessons as $l)
                                        <div class="radio__button">
                                            <div class="form-check">
                                                <input type="checkbox">
                                                <a class="text-dark" href="{{route('study.learn', $course->id)}}?chapter_id={{$chapter->id}}&lesson_id={{$l->id}}" style="color: blackl; text-decoration: none;">{{$l->title}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="questionModal">
    <div class="modal-dialog modal-lg">

        <form id="questionform">
            @csrf
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Ask Question</h4>
                    <button type="button" class="close" data-toggle="modal" data-target="#questionModal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="question_success_alert" style="display: none;">
                        <div class="row justify-content-center">
                            <i class="fa fa-check-circle-o" style="font-size: 60px; color:#14A44D"></i>
                            <p class="text-center">Your question was send to instructor successfully</p>
                        </div>
                    </div>

                    <div id="questionbox">
                        <div id="question_failed_alert" class="alert alert-danger alert-dismissible" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Failed!</strong> Something Went Wrong!.
                        </div>

                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-control" name="question"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="ask_question">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $("#ask_question").on("click", function(event) {
        event.preventDefault()

        let formdata = new FormData()
        formdata.append("question", $("textarea[name='question']").val())
        formdata.append("lesson_id", <?php echo $lesson['id'] ?>)

        fetch("{{ route('ask_question') }}", {
                headers: {
                    "X-CSRF-Token": $('input[name="_token"]').val()
                },
                method: "POST",
                body: formdata
            })
            .then(response => response.json())
            .then(data => console.log())
            .catch(console.log)
    })
</script>
@stop