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
                                @if(isset($course))
                                <img src="{{asset(Storage::url($course->thumbnail))}}" alt="" class="w-100 h-100 object-fit-cover" />
                                @else
                                <img src="{{asset('assets/instructor')}}/images/placeholder-thumbnail.jpg" alt="" class="w-100 h-100 object-fit-cover" />
                                @endif
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="position-relative">
                                <label class="label">Upload Course Image</label>
                                <label for="acfCourseUploadImgButton" class="custom-file-upload-btn">
                                  <span>No file Selected</span>
                                  <span>Upload File</span>
                                </label>
                                <input type="file" name="thumbnail" class="custom-file-upload-input" id="acfCourseUploadImgButton" required />
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
    // Selecting paid or free course - showing currency and amount section as per input
    $(document).ready(function() {
      $(".add-course-form-wrap #courseType").on("change", function() {
        $(".add-course-form-wrap .pricing-input-field").removeClass("active");

        if ($(this).val() === "paid") {
          $(".add-course-form-wrap .pricing-input-field").addClass("active");
        }
      });
    })

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
  </script>
</body>

</html>