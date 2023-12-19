<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/instructor/images/apple-touch-icon.png')}}" />
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/instructor/images/favicon-32x32.png')}}" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/instructor/images/favicon-16x16.png')}}" />

  <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

  <link rel="stylesheet" href="{{asset('assets/instructor/vendors/bootstrap-5.3.0-dist/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/instructor/vendors/owl-carousel-2.3.4/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/instructor/vendors/owl-carousel-2.3.4/owl.theme.default.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/instructor/css/style.css')}}" />

  <title>Fintekin - Add New Course</title>
</head>

<body>
  <header class="topbar bg--dark py-3 text-center">
    <a href="{{ route('instructor.dashboard') }}" class="text-uppercase fw-semibold link--light"><i class="fa-solid fa-chevron-left me-2"></i> Back to Courses</a>
  </header>
  <main>
    <section class="new-course-wrap-section">
      <div class="container">
        <div class="wrap">
          <div class="row">
            <div class="col-12 col-lg-4 col-xxl-3">
              <aside>
                <div class="block">
                  <p class="fw-bold text--dark lh-1">Publish Your Course</p>

                  <ul>
                    <li class="active">
                      <a href="#" data-target="courseLandingPageBlock"><span></span>Course Landing Page</a>
                    </li>
                  </ul>
                </div>

                <div id="couse_details" class="<?php if (isset($course) == false) {
                                                  echo "d-none";
                                                } ?>">
                  <div class="block">
                    <p class="fw-bold text--dark lh-1">Plan Your Course</p>

                    <ul>
                      <li>
                        <a href="#" data-target="courseIntendedLearnersBlock"><span></span>Intended Learners</a>
                      </li>
                      <!-- <li>
                        <a href="#" data-target="courseStructureBlock"><span></span>Course Structure</a>
                      </li> -->
                    </ul>
                  </div>

                  <div class="block">
                    <p class="fw-bold text--dark lh-1">Create Your Content</p>

                    <ul>
                      <li>
                        <a href="#" data-target="courseCurriculumBlock"><span></span>Curriculum</a>
                      </li>
                    </ul>
                  </div>

                  <div class="block">
                    <p class="fw-bold text--dark lh-1">Prmotion & Messages</p>

                    <ul>
                      <li>
                        <a href="#" data-target="coursePromotionsBlock"><span></span>Promotions</a>
                      </li>
                      <li class="d-none">
                        <a href="#" data-target="courseMessageBlock"><span></span>Course Message</a>
                      </li>
                    </ul>
                  </div>

                  <div>
                    <button class="btn btn--primary" onclick="submitforreview()">Save For Review</button>
                  </div>
                </div>
              </aside>
            </div>
            <div class="col-12 col-lg-8 col-xxl-9">
              <div class="tab-content-wrap">
                <div class="tab-pane active" data-id="courseLandingPageBlock">
                  <div class="tab-pane__header">
                    <h4 class="mb-0 text--dark fw-bold">Course Landing Page</h4>
                  </div>
                  <div class="tab-pane__body">
                    <div class="content-box">
                      <p>Your course landing page is crucial to your success on Udemy. If it’s done right, it can also help you gain visibility in search engines like Google. As you complete this section, think about creating a compelling Course Landing Page that demonstrates why someone would want to enroll in your course. Learn more about <a href="#">creating your course landing page</a> and <a href="#">course title standards</a>.</p>
                    </div>

                    <div class="add-course-form-wrap">
                      <form action="{{ route('course.store') }}" method="POST" id="course" enctype="multipart/form-data">
                        @csrf
                        <div>
                          <label class="label">Course Title</label>
                          <input type="text" name="title" placeholder="Enter your course title" required value="<?php if (isset($course)) {
                                                                                                                  echo $course->title;
                                                                                                                } ?>" />
                          <span class="helper-text">Your title should be a mix of attention-grabbing, informative, and optimized for search</span>
                        </div>

                        <div>
                          <label class="label">Course Subtitle</label>
                          <input type="text" name="subtitle" placeholder="Enter your course subtitle" required value="<?php if (isset($course)) {
                                                                                                                        echo $course->subtitle;
                                                                                                                      } ?>" />
                          <span class="helper-text">Use 1 or 2 related keywords, and mention 3-4 of the most important areas that you've covered during your course.</span>
                        </div>

                        <div>
                          <div class="row">
                            <div class="col-12 col-md-6">
                              <div class="img-container" id="thumbnailPreviewContainer">
                                <img src="{{asset(Storage::url($course->thumbnail))}}" alt="" class="w-100 h-100 object-fit-cover" />
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="position-relative">
                                <label class="label">Upload Course Image</label>
                                <label for="acfCourseUploadImgButton" class="custom-file-upload-btn">
                                  <span>No file Selected</span>
                                  <span>Upload File</span>
                                </label>
                                <input type="file" name="thumbnail" class="form-control" id="acfCourseUploadImgButton" required />
                                <span class="helper-text">Upload your course image here. It must meet our course image quality standards to be accepted. Important guidelines: 750x422 pixels; .jpg, .jpeg,. gif, or .png. no text on the image.</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div>
                          <label class="label">Basic Info</label>
                          <div class="row">
                            <div class="row">
                              <div class="col-12 col-sm-6 col-lg-4">
                                <select name="language" required>
                                  <option value="english(us)" selected <?php if (isset($course) && $course->language == "english(us)") {
                                                                          echo "selected";
                                                                        } ?>>English(US)</option>
                                  <option value="english(uk)" <?php if (isset($course) && $course->language == "english(uk)") {
                                                                echo "selected";
                                                              } ?>>English(UK)</option>
                                  <option value="english(india)" <?php if (isset($course) && $course->language == "english(india)") {
                                                                    echo "selected";
                                                                  } ?>>English(India)</option>
                                </select>
                              </div>

                              <div class="col-12 col-sm-6 col-lg-4">
                                <select name="level" required>
                                  <option value="" selected disabled>--Select Level--</option>
                                  <option value="BEGINNER" <?php if (isset($course) && $course->level == "BEGINNER") {
                                                              echo "selected";
                                                            } ?>>Beginner Level</option>
                                  <option value="INTERMEDIATE" <?php if (isset($course) && $course->level == "INTERMEDIATE") {
                                                                  echo "selected";
                                                                } ?>>Intermediate Level</option>
                                  <option value="EXPERT" <?php if (isset($course) && $course->level == "EXPERT") {
                                                            echo "selected";
                                                          } ?>>Expert Level</option>
                                  <option value="ALL" <?php if (isset($course) && $course->level == "ALL") {
                                                        echo "selected";
                                                      } ?>>All Level</option>
                                </select>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12 col-sm-6 col-lg-4">
                                <select id="category" required>
                                  <option value="" selected disabled>--Select Category--</option>
                                  @foreach($categories as $category)
                                  <option value="{{ $category->id }}" <?php if (isset($course) && $course->category_id == $category->id) {
                                                                        echo "selected";
                                                                      } ?>>{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-12 col-sm-6 col-lg-4">
                                <select name="category_id" id="sub_category" required>
                                  <option value="" selected disabled>--Select Subcategory--</option>
                                  @foreach($categories as $category)
                                  <option value="{{ $category->id }}" <?php if (isset($course) && $course->category_id == $category->id) {
                                                                        echo "selected";
                                                                      } ?>>{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12 col-sm-6 col-lg-4">
                                <select name="price_type" id="courseType" required>
                                  <option value="" selected disabled>Select Course Type</option>
                                  <option value="free" <?php if (isset($course) && $course->price_type == "FREE") {
                                                          echo "selected";
                                                        } ?>>Free</option>
                                  <option value="paid" <?php if (isset($course) && $course->price_type == "PAID") {
                                                          echo "selected";
                                                        } ?>>Paid</option>
                                </select>
                              </div>

                              <div class="col-12 col-sm-6 col-lg-8 pricing-input-field">
                                <div>
                                  <input type="number" name="price" placeholder="Enter price here." />
                                </div>

                                <div>
                                  <input type="number" name="sale_price" placeholder="Enter sale price here." />
                                </div>

                                <span class="helper-text">If you intend to offer your course for free, the total length of video content must be less than 2 hours.</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="text-end">
                          <button type="submit" class="btn btn--dark">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                @if(isset($course))
                <div class="tab-pane" data-id="courseIntendedLearnersBlock">
                  <div class="tab-pane__header">
                    <h4 class="mb-0 text--dark fw-bold">Intended Learners</h4>
                  </div>
                  <div class="tab-pane__body">
                    <div class="content-box mb-4">
                      <p>The following descriptions will be publicly visible on your <a href="#">Course Landing Page</a> and will have a direct impact on your course performance. These descriptions will help learners decide if your course is right for them.</p>
                    </div>

                    <div class="intended-learners-form-wrap">
                      <form action="{{ route('coursemeta.update', $course_meta->id) }}" method="POST" id="intended_learners_form">
                        @csrf
                        @method("PUT")
                        <fieldset>
                          <div class="content-box">
                            <p><strong>What will students learn in your course?</strong></p>
                            <p>You must enter at least 4 learning objectives or outcomes that learners can expect to achieve after completing your course.</p>
                          </div>

                          <ul class="intended_what_will_student_learn inputs-list">
                            <?php $things_to_learn = json_decode($course_meta->things_to_learn) ?>
                            @if(is_null($things_to_learn) == false)
                            @foreach($things_to_learn as $learn)
                            <li>
                              <input type="text" name="things_to_learn[]" placeholder="Example: Define the roles and responsibilities of a project manager" value="{{$learn}}" />
                            </li>
                            @endforeach
                            @endif
                          </ul>
                          <button type="button" class="intended_what_will_student_learn_add_btn btn--add-response"><i class="fa-solid fa-plus"></i>Add more to your response</button>
                        </fieldset>

                        <fieldset>
                          <div class="content-box">
                            <p><strong>What are the requirements or prerequisites for taking your course?</strong></p>
                            <p>List the required skills, experience, tools or equipment learners should have prior to taking your course. If there are no requirements, use this space as an opportunity to lower the barrier for beginners.</p>
                          </div>

                          <ul class="intended_requirements inputs-list">
                            <?php $requirements = json_decode($course_meta->requirements) ?>
                            @if(is_null($requirements) == false)
                            @foreach($requirements as $requirement)
                            <li>
                              <input type="text" name="requirements[]" placeholder="Example: No programming experience needed. You will learn everything you need to know" value="{{$requirement}}" />
                            </li>
                            @endforeach
                            @endif
                          </ul>
                          <button type="button" class="intended_requirements_add_btn btn--add-response"><i class="fa-solid fa-plus"></i>Add more to your response</button>
                        </fieldset>

                        <fieldset>
                          <div class="content-box">
                            <p><strong>Who is this course for?</strong></p>
                            <p>Write a clear description of the <a href="#">intended learners</a> for your course who will find your course content valuable. This will help you attract the right learners to your course.</p>
                          </div>

                          <ul class="inputs-list intended_course_for">
                            <?php $target_audiences = json_decode($course_meta->target_audience) ?>
                            @if(is_null($target_audiences) == false)
                            @foreach($target_audiences as $target_audience)
                            <li>
                              <input type="text" name="target_audience[]" placeholder="Example: Beginner Python developers curious about data science" value="{{$target_audience}}" />
                            </li>
                            @endforeach
                            @endif
                          </ul>
                          <button type="button" class="intended_course_for_add_btn btn--add-response"><i class="fa-solid fa-plus"></i>Add more to your response</button>
                        </fieldset>

                        <div class="text-end">
                          <button type="submit" class="btn btn--dark">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" data-id="courseCurriculumBlock">
                  <div class="tab-pane__header">
                    <h4 class="mb-0 text--dark fw-bold">Curriculum</h4>
                  </div>
                  <div class="tab-pane__body">
                    <div class="highlight-text-box">
                      <span class="flex-shrink-0 me-3"><i class="fa-solid fa-circle-info"></i></span>
                      <div>
                        <p><strong>Here’s where you add course content—like lectures, course sections, assignments, and more. Click a + icon on the left to get started.</strong></p>
                        <button role="button" class="btn btn--dark">Dismiss</button>
                      </div>
                    </div>

                    <div class="content-box">
                      <p>Start putting together your course by creating sections, lectures and practice (quizzes, coding exercises and assignments).</p>

                      <p>Start putting together your course by creating sections, lectures and practice activities (quizzes, coding exercises and assignments). Use your course outline to structure your content and label your sections and lectures clearly. If you’re intending to offer your course for free, the total length of video content must be less than 2 hours.</p>
                    </div>

                    <div class="curriculumn-form-wrap">
                      <form action="#">
                        <ul class="section-list">
                          @foreach($course->chapters as $chapter)
                          <li>
                            <fieldset class="cur-section" data-chapter_id="{{ $chapter->id }}">
                              <div class="cur-section__header">
                                <div class="row align-items-center">
                                  <div class="col-9 d-flex align-items-center">
                                    <p class="fw-bold mb-0 flex-shrink-0">Chapter {{ $loop->iteration }}: <i class="fa-regular fa-file ms-3 me-1"></i></p>
                                    <input type="text" name="chapter_title" value="{{ $chapter->title }}" disabled="">
                                  </div>
                                  <div class="col-3">
                                    <div class="cta-btns text-end">
                                      <button type="button" class="btn--section-edit"><i class="fa-regular fa-pen-to-square"></i></button>
                                      <button type="button" class="btn--section-remove"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                  </div>
                                </div>

                                <div class="final-action-btns text-end">
                                  <button type="button" class="btn--section-edit-cancel d-none">Cancel</button>
                                  <button type="button" class="btn btn--dark btn--section-edit-save">Save</button>
                                </div>
                              </div>
                              <div class="cur-section__body">
                                <ul class="chapter-list">
                                  @foreach($chapter->lessons as $lesson)
                                  <li class="chapter-block" data-lesson_id="{{$lesson->id}}">
                                    <div class="chapter-block__header">
                                      <div class="row">
                                        <div class="col-9">
                                          <span class="me-2"><i class="fa-solid fa-circle-check me-1"></i> Lecture {{ $loop->iteration }}:</span>
                                        </div>
                                        <div class="col-3">
                                          <div class="cta-btns text-end">
                                            <button type="button" class="btn--chapter-block-expand"><i class="fa-solid fa-chevron-down"></i></button>
                                            <button type="button" class="chapter-block--remove"><i class="fa-regular fa-trash-can"></i></button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="chapter-block__body lesson_block">
                                      <div>
                                        <label class="label">Chapter Title</label>
                                        <input type="text" name="lesson_title" placeholder="Enter your chapter title" value="{{$lesson->title}}">
                                      </div>
                                      @if(is_null($lesson->content) == false)
                                      <div>
                                        <iframe width="100%" height="360" src="<?php echo asset(Storage::url($lesson->content)); ?>" title="YouTube video player" frameborder="0"></iframe>
                                      </div>
                                      @endif
                                      <div class="position-relative">
                                        <label class="label">Upload Video</label>
                                        <input type="file" name="lesson_video" class="form-control" id="chapter1VideoBtn">
                                      </div>
                                    </div>
                                  </li>
                                  @endforeach
                                </ul>
                                <div class="add-curriculumn-btn-wrapper">
                                  <button type="button" class="btn btn--dark btn--add-curriculumn"><i class="fa-solid fa-plus me-2"></i>Curriculum Item</button>
                                </div>
                              </div>
                            </fieldset>
                          </li>
                          @endforeach
                        </ul>
                        <div class="mt--20">
                          <button type="button" class="btn btn--dark btn--add-section"><i class="fa-solid fa-plus me-2"></i>Add Chapter</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" data-id="coursePromotionsBlock">
                  <div class="tab-pane__header">
                    <h4 class="mb-0 text--dark fw-bold">Promotions</h4>
                  </div>
                  <div class="tab-pane__body">
                    <div class="highlight-text-box">
                      <span class="flex-shrink-0 me-3"><i class="fa-solid fa-circle-info"></i></span>
                      <div class="content-box">
                        <p>
                          <strong>We have updated the coupon system, and there is more to come. Announcing new free coupon limits and bulk coupon creation.<a href="#">Learn More</a></strong>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" data-id="courseMessageBlock">
                  <div class="tab-pane__header">
                    <h4 class="mb-0 text--dark fw-bold">Course Message</h4>
                  </div>
                  <div class="tab-pane__body">
                    <div class="content-box">
                      <p>Write messages to your students (optional) that will be sent automatically when they join or complete your course to encourage students to engage with course content. If you do not wish to send a welcome or congratulations message, leave the text box blank.</p>
                    </div>

                    <form action="#" class="course-message-form-wrap">
                      <div>
                        <label class="label">Welcome Message</label>
                        <textarea name="cmf_welcome_message" placeholder="Enter your message here..."></textarea>
                      </div>

                      <div>
                        <label class="label">Congratulations Message</label>
                        <textarea name="cmf_congo_message" placeholder="Enter your congratulations message here..."></textarea>
                      </div>

                      <div class="text-end">
                        <button type="submit" class="btn btn--dark">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="{{asset('assets/instructor/vendors/jquery.min.js')}}"></script>
  <script src="{{asset('assets/instructor/vendors/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://kit.fontawesome.com/2d537fef4a.js" crossorigin="anonymous"></script>
  <script src="{{asset('assets/instructor/vendors/owl-carousel-2.3.4/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/instructor/js/script.js')}}"></script>

  <script>
    $(document).ready(function() {
      // ---> Site Header Shrink
      const siteHeader = $(".site-header");
      $(window).scroll(function() {
        if ($(document).scrollTop() > 30) {
          siteHeader.addClass("site-header--shrinked");
        } else {
          siteHeader.removeClass("site-header--shrinked");
        }

        // Scroll Top fade in out
        if ($(document).scrollTop() > 300) {
          $(".btn--scroll-to-top").addClass("show");
        } else {
          $(".btn--scroll-to-top").removeClass("show");
        }
      });

      $(".btn--scroll-to-top").on("click", function() {
        scrollToTop(0, 500);
      });

      function scrollToTop(offset, duration) {
        $("html, body").animate({
          scrollTop: offset
        }, duration);
        return false;
      }

      // ---> Products Carousel
      $(".products-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 1000,
        margin: 10,
        nav: false,
        navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
        dots: true,
        responsive: {
          0: {
            items: 2,
            margin: 12,
          },
          576: {
            items: 3,
            margin: 14,
          },
          768: {
            margin: 16,
          },
          992: {
            items: 3,
            margin: 24,
          },
          1200: {
            items: 4,
            margin: 24,
          },
          1400: {
            items: 4,
            margin: 28,
          },
          1700: {
            items: 4,
            margin: 32,
          },
        },
      });

      // ---> Accordion
      $(".set > a").on("click", function(e) {
        e.preventDefault();

        if ($(this).hasClass("active")) {
          $(this).removeClass("active");
          $(this).siblings(".content").slideUp(200);
          $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
        } else {
          $(".set > a i").removeClass("fa-chevron-down").addClass("fa-chevron-down");
          $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
          $(".set > a").removeClass("active");
          $(this).addClass("active");
          $(".content").slideUp(200);
          $(this).siblings(".content").slideDown(200);
        }
      });

      $(".new-course-wrap-section aside .block ul li a").on("click", function(e) {
        e.preventDefault();
        var getTarget = $(this).attr("data-target");
        // console.log(getTarget);
        $(".new-course-wrap-section aside .block ul li").removeClass("active");
        $(this).parent().addClass("active");

        $(".new-course-wrap-section .tab-pane").removeClass("active");
        $(".new-course-wrap-section .tab-pane[data-id='" + getTarget + "']").addClass("active");
      });

      // ---> New Course Form
      //---> Intended Learners Form
      //---> Curriculum Form Wrap
      $(document).on("click", ".curriculumn-form-wrap .btn--section-edit", function() {
        $(this).closest(".cur-section__header").addClass("edit-mode-active");
        $(this).closest(".cur-section__header").find("input").removeAttr("disabled");
      });

      $(document).on("click", ".curriculumn-form-wrap .btn--section-edit-save", function() {
        $(this).closest(".cur-section__header").removeClass("edit-mode-active");
        $(this).closest(".cur-section__header").find("input").attr("disabled", "disabled");
      });

      $(document).on("click", ".curriculumn-form-wrap .btn--chapter-block-expand", function() {
        if ($(this).closest(".chapter-block").hasClass("is-opened")) {
          $(this).closest(".chapter-block").removeClass("is-opened");
          $(this).closest(".chapter-block").find(".chapter-block__body").slideUp(300);
        } else {
          $(this).closest(".chapter-block").addClass("is-opened");
          $(this).closest(".chapter-block").find(".chapter-block__body").slideDown(300);
        }
      });

      // Selecting paid or free course - showing currency and amount section as per input
      $(".add-course-form-wrap #courseType").on("change", function() {
        $(".add-course-form-wrap .pricing-input-field").removeClass("active");

        if ($(this).val() === "paid") {
          $(".add-course-form-wrap .pricing-input-field").addClass("active");
        }
      });

      $(document).on("click", ".intended_what_will_student_learn_add_btn", function() {
        $(".intended_what_will_student_learn").append(`<li>
        <input type="text" name="things_to_learn[]" placeholder="Example: Beginner Python developers curious about data science" />
    </li>`)
      })

      $(document).on("click", ".intended_requirements_add_btn", function() {
        $(".intended_requirements").append(`<li>
        <input type="text" name="requirements[]" placeholder="Example: Beginner Python developers curious about data science" />
    </li>`)
      })


      $(document).on("click", ".intended_course_for_add_btn", function() {
        $(".intended_course_for").append(`<li>
            <input type="text" name="target_audience[]" placeholder="Example: Beginner Python developers curious about data science" />
        </li>`)
      })

      // Internded learners duplicate field creation
      $(".intended-learners-form-wrap .btn--add-response").on("click", function() {
        var getInputFieldName = $(this).prev().find("input").attr("name");
        var htmlString = `<li>
          <input type="text" name="${getInputFieldName}" placeholder="Example: Estimate project timelines and budgets" />
          </li>`;

        if ($(this).prev().find("li:last-child input").val().trim().length > 0) {
          $(this).prev().append(htmlString);
        }
      });

      // Add New Chapter
      $(".curriculumn-form-wrap .btn--add-section").on("click", function() {
        let htmlString = "";
        let numberOfChapter = $(".cur-section").length

        let formdata = new FormData();
        formdata.append("course_id", sessionStorage.getItem("course_id"))

        fetch("{{ route('curriculum.create_chapter') }}", {
            headers: {
              "X-CSRF-Token": $('input[name="_token"]').val()
            },
            method: "POST",
            body: formdata
          })
          .then(response => response.json())
          .then(data => {
            console.log(data)

            htmlString += `<li>
              <fieldset class="cur-section" data-chapter_id="${data.chapter.id}">
              <div class="cur-section__header">
                <div class="row align-items-center">
                  <div class="col-9 d-flex align-items-center">
                    <p class="fw-bold mb-0 flex-shrink-0">Chapter ${++numberOfChapter}: <i class="fa-regular fa-file ms-3 me-1"></i></p>
                    <input type="text" name="chapter_title" value="Chapter Title" disabled="">
                  </div>
                  <div class="col-3">
                    <div class="cta-btns text-end">
                      <button type="button" class="btn--section-edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button type="button" class="btn--section-remove"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                  </div>
                </div>

                <div class="final-action-btns text-end">
                  <button type="button" class="btn--section-edit-cancel d-none">Cancel</button>
                  <button type="button" class="btn btn--dark btn--section-edit-save">Save</button>
                </div>
              </div>
              <div class="cur-section__body">
                <ul class="chapter-list">
                  <li class="chapter-block" data-lesson_id="${data.lesson.id}">
                    <div class="chapter-block__header">
                      <div class="row">
                        <div class="col-9">
                          <span class="me-2"><i class="fa-solid fa-circle-check me-1"></i> Lecture 1:</span>
                        </div>
                        <div class="col-3">
                          <div class="cta-btns text-end">
                            <button type="button" class="btn--chapter-block-expand"><i class="fa-solid fa-chevron-down"></i></button>
                            <button type="button" class="chapter-block--remove"><i class="fa-regular fa-trash-can"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chapter-block__body lesson_block">
                      <div>
                        <label class="label">Chapter Title</label>
                        <input type="text" name="lesson_title" value="" placeholder="Enter your chapter title">
                      </div>

                      <div class="position-relative">
                        <label class="label">Upload Video</label>
                        <input type="file" name="lesson_video" class="form-control" id="chapter1VideoBtn">
                      </div>

                      <!-- <div class="position-relative">
                        <label class="label">Upload Slide</label>
                        <label for="chapter1SlideBtn" class="custom-file-upload-btn">
                          <span>No file Selected</span>
                          <span>Upload File</span>
                        </label>
                        <input type="file" name="chapter_1_slide_" class="form-control" id="chapter1SlideBtn" />
                      </div> -->

                      <!-- <div class="position-relative">
                        <label class="label">Upload Article</label>
                        <label for="chapter1ArticleBtn" class="custom-file-upload-btn">
                          <span>No file Selected</span>
                          <span>Upload File</span>
                        </label>
                        <input type="file" name="chapter_1_article" class="form-control" id="chapter1ArticleBtn" />
                      </div> -->
                    </div>
                  </li>
                </ul>
                <div class="add-curriculumn-btn-wrapper">
                  <button type="button" class="btn btn--dark btn--add-curriculumn"><i class="fa-solid fa-plus me-2"></i>Curriculum Item</button>
                </div>
              </div>
              </fieldset>
            </li>`;

            $(".curriculumn-form-wrap form .section-list").append(htmlString);

          })


        initSectionEdit();
        initSectionEditCancel();
        // initAddCurriculum();
      });

      // Delete Chapter
      $(document).on("click", ".btn--section-remove", function(event) {

        let formdata = new FormData()

        let chapter_id = $(this).closest(".cur-section").data("chapter_id")
        formdata.append("chapter_id", chapter_id)

        fetch("{{ route('curriculum.delete_chapter') }}", {
            headers: {
              "X-CSRF-Token": $('input[name="_token"]').val()
            },
            method: "POST",
            body: formdata
          })
          .then(response => response.json())
          .then(data => {
            console.log(data)

            $(this).closest("li").remove()
          })
          .catch(console.log)
      })

      // Add New Curriculumn
      $(document).on("click", ".curriculumn-form-wrap .btn--add-curriculumn", function(event) {
        let chapter_id = $(this).closest(".cur-section").data("chapter_id")

        let formdata = new FormData();
        formdata.append("chapter_id", chapter_id)

        fetch("{{ route('curriculum.create_lesson') }}", {
            headers: {
              "X-CSRF-Token": $('input[name="_token"]').val()
            },
            method: "POST",
            body: formdata
          })
          .then(response => response.json())
          .then(data => {
            console.log(data)

            let htmlString = `<li class="chapter-block" data-lesson_id="${data.lesson.id}">
                <div class="chapter-block__header">
                  <div class="row">
                    <div class="col-9">
                      <span class="me-2"><i class="fa-solid fa-circle-check me-1"></i> Lecture 1:</span>
                    </div>
                    <div class="col-3">
                      <div class="cta-btns text-end">
                        <button type="button" class="btn--chapter-block-expand"><i class="fa-solid fa-chevron-down"></i></button>
                        <button type="button" class="chapter-block--remove"><i class="fa-regular fa-trash-can"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="chapter-block__body">
                  <div>
                    <label class="label">Chapter Title</label>
                    <input type="text" name="lesson_title" value="" placeholder="Enter your chapter title">
                  </div>
            
                  <div class="position-relative">
                    <label class="label">Upload Video</label>
                    <input type="file" name="lesson_video" class="form-control" id="chapter1VideoBtn">
                  </div>
                </div>
            </li>`;
            $(this).closest(".cur-section__body").find(".chapter-list").append(htmlString);
          })
      });

      // Delete Curriculumn
      $(document).on("click", ".chapter-block--remove", function() {
        let formdata = new FormData()

        let lesson_id = $(this).closest("li").data("lesson_id")
        formdata.append("lesson_id", lesson_id)

        fetch("{{ route('curriculum.delete_lesson') }}", {
            headers: {
              "X-CSRF-Token": $('input[name="_token"]').val()
            },
            method: "POST",
            body: formdata
          })
          .then(response => response.json())
          .then(data => {
            console.log(data)

            $(this).closest("li").remove()
          })
          .catch(console.log)
      })

      // Update Chapter Title
      $(document).on("change", "input[name='chapter_title']", function() {
        let chapter_id = $(this).closest(".cur-section").data("chapter_id")

        let formdata = new FormData()
        formdata.append("chapter_id", chapter_id)
        formdata.append("chapter_title", $(this).val())

        fetch("{{ route('curriculum.update_chapter_title') }}", {
            headers: {
              "X-CSRF-Token": $('input[name="_token"]').val()
            },
            method: "POST",
            body: formdata
          })
          .then(response => response.json())
          .then(data => {
            console.log(data)
          })
      })

      // Update Lesson Title
      $(document).on("change", "input[name='lesson_title']", function() {
        let lesson_id = $(this).closest("li").data("lesson_id")

        let formdata = new FormData()
        formdata.append("lesson_id", lesson_id)
        formdata.append("lesson_title", $(this).val())

        fetch("{{ route('curriculum.update_lesson_title') }}", {
            headers: {
              "X-CSRF-Token": $('input[name="_token"]').val()
            },
            method: "POST",
            body: formdata
          })
          .then(response => response.json())
          .then(data => {
            console.log(data)
          })
      })

      $(document).on("change", "input[name='lesson_video']", function(event) {
        let lesson_id = $(this).closest("li").data("lesson_id")

        let formdata = new FormData()
        formdata.append("lesson_id", lesson_id)
        formdata.append("content", event.target.files[0])

        axios.post("{{ route('curriculum.update_lesson_content') }}", formdata, {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
            onUploadProgress: function({
              loaded,
              total,
              progress,
              bytes,
              estimated,
              rate,
              upload = true
            }) {
              console.log({
                loaded,
                total,
                progress,
                bytes,
                estimated,
                rate,
                upload
              })
            },
          })
          .then((response) => {
            console.log(response.data)
            event.target.value = ""
          })
          .catch((error) => {
            console.error(error);
            event.target.value = ""
          });
      })

      // duplicate chapter creation function
      function initAddCurriculum() {
        let htmlString = `<li class="chapter-block">
          <div class="chapter-block__header">
            <div class="row">
              <div class="col-9">
                <span class="me-2"><i class="fa-solid fa-circle-check me-1"></i> Lecture 1:</span>
              </div>
              <div class="col-3">
                <div class="cta-btns text-end">
                  <button type="button" class="btn--chapter-block-expand"><i class="fa-solid fa-chevron-down"></i></button>
                  <button type="button" class="chapter-block--remove"><i class="fa-regular fa-trash-can"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="chapter-block__body">
            <div>
              <label class="label">Chapter Title</label>
              <input type="text" name="lesson_title" value="" placeholder="Enter your chapter title">
            </div>
      
            <div class="position-relative">
              <label class="label">Upload Video</label>
              <input type="file" name="lesson_video" class="form-control" id="chapter1VideoBtn">
            </div>
          </div>
        </li>`;

        $(this).closest(".cur-section__body").find(".chapter-list").append(htmlString);
      }

      initAddCurriculum();
    });
  </script>

  <script>
    // Get Subcategories
    $("#category").on("change", function(event) {
      event.preventDefault()
      let formdata = new FormData()
      formdata.append("category_id", $("#category").val())

      $("#sub_category").empty()
      $("#sub_category").append(`<option value="">--Select Subcategory--</option>`)
      fetch("{{ route('category.subcategories') }}", {
          headers: {
            "X-CSRF-Token": $('input[name="_token"]').val()
          },
          method: "POST",
          body: formdata
        })
        .then(response => response.json())
        .then(data => {
          data.categories.forEach((category, index) => {
            $("#sub_category").append(`<option value="${category.id}">${category.name}</option>`)
          })
        })
    })

    function submitforreview() {
      alert("The course is submitted for review")
      // Swal.fire({
      //   title: "Good job!",
      //   text: "The course is submitted for review",
      //   icon: "success"
      // });
      window.location.href="{{route('instructor.dashboard')}}"
    }

    // Global Fetch Form Submitter
    // $("#intended_learners_form").on("submit", function(event) {
    //   event.preventDefault()

    //   fetch(event.target.action, {
    //       headers: {
    //         "X-CSRF-Token": $('input[name="_token"]').val()
    //       },
    //       method: "PUT",
    //       body: new FormData(document.getElementById(event.target.id))
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //       alert(data.message)
    //     })
    //     .catch(error => console.log(error))
    // })
  </script>

  @if(isset($course))
  <script>
    sessionStorage.setItem("course_id", <?php echo $course->id ?>)
  </script>
  @endif
</body>

</html>