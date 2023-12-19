<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/instructor/images/apple-touch-icon.png') }}" />
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/instructor/images/favicon-32x32.png') }}" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/instructor/images/favicon-16x16.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/instructor/vendors/bootstrap-5.3.0-dist/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/instructor/vendors/owl-carousel-2.3.4/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/instructor/vendors/owl-carousel-2.3.4/owl.theme.default.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/instructor/css/style.css') }}" />
  <title>Fintekin - Instructor Dasboard</title>
</head>

<body>
  <div class="db-wrap">
    <aside class="db__sidebar">
      <div class="sidebar__top">
        <a href="{{ route('instructor.dashboard') }}">
          <img src="{{ asset('assets/instructor/images/footer_logo.png') }}" alt="" />
        </a>

        <button class="btn--sidebar-toggler bg-transparent border-0 d-none d-xl-inline-block"><i class="fa-solid fa-bars"></i></button>
        <button class="btn--sidebar-close text-white fs-4 d-xl-none bg-transparent border-0"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <div class="sidebar-nav-wrap">
        <nav>
          <ul>
            @php

            $mid = DB::table('instructorregistration')->where('status', 1)->where('user_id',auth()->user()->id)->get();$fin = DB::table('instructorregistration')->where('status', 2)->where('user_id',auth()->user()->id)->get();
            $prec = $mid->count();

            @endphp
            <?php if ($prec == 1){ ?>
            <li>
              <a href="" title="Courses">
                <i class="fa-solid fa-circle-play"></i>
                <span>Dashboard</span>
              </a>
            </li>
<?php } else { ?>
            <li>
              <a href="{{ route('instructor.dashboard') }}" title="Courses">
                <i class="fa-solid fa-circle-play"></i>
                <span>Courses</span>
              </a>
            </li>
            <li>
              <a href="communication.html" title="Communication">
                <i class="fa-solid fa-comment"></i>
                <span>Communication</span>
              </a>
            </li>
            <li>
              <a href="{{ route('instructor.earning') }}" title="Earnings">
                <i class="fa-solid fa-money-bill"></i>
                <span>Earnings</span>
              </a>
            </li>
            <li>
              <a href="{{route('enrolling.index')}}" title="Enrollment">
                <i class="fa-solid fa-money-bill"></i>

                <span>Student Enrolled</span>
              </a>
            </li>
            <li>
              <a href="{{route('courseearn.index')}}" title="Enrollment">
                <i class="fa-solid fa-money-bill"></i>

                <span>Cource Wise Earning</span>
              </a>
            </li>
            <li>
              <a href="javascript:;" class="has-arrow" title="Help & Support">
                <i class="fa-solid fa-question"></i>
                <span>Help & Support</span>
              </a>
              <ul>
                <li> <a href="{{route('help.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Support</a></li>
                <li> <a href="{{route('help.index')}}"><i class="bx bx-right-arrow-alt"></i>View Support</a></li>
              </ul>
            </li>
            <li>
              <a href="{{route('instructor.transaction')}}" title="Enrollment">
                <i class="fa-solid fa-money-bill"></i>
                <span>Transaction History</span>
              </a>
            </li>
            <li>
              <a href="{{route('instructor.fetchforums')}}" title="Enrollment">
                <i class="fa-solid fa-money-bill"></i>
                <span>Question Forum</span>
              </a>
            </li>
<?php } ?>
          </ul>
        </nav>
      </div>
    </aside>

    <main class="db__main bg--light">
      <header class="db__topbar">
        <div class="row align-items-center">
          <div class="col-8 col-md-6 col-lg-4 d-flex align-items-center">
            <button class="btn--sidebar-toggler bg-transparent border-0 d-xl-none me-3 fs-4"><i class="fa-solid fa-bars"></i></button>

            <div class="db-search-form-wrap">
              <form action="#">
                <div class="position-relative">
                  <input type="text" name="db_sf_inp" placeholder="Search here..." />
                  <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="form-result-wrap">
                  <p class="status-not-found">No result found.</p>
                  <ul>
                    <li>Result Item 1</li>
                    <li>Result Item 2</li>
                    <li>Result Item 3</li>
                  </ul>
                </div>
              </form>
            </div>
          </div>
          <div class="col-4 col-md-6 col-lg-8 d-flex align-items-center justify-content-end">
            <div class="custom-dropdown-wrap d-inline-block w-auto">
              <button class="custom-dropdown-wrap__btn--trigger">
                <i class="fa-solid fa-bell"></i>
                <span class="count">0</span>
              </button>
              <div class="custom-dropdown-wrap__body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="instructor-tab" data-bs-toggle="tab" data-bs-target="#instructor" type="button" role="tab" aria-controls="instructor" aria-selected="true">Instructor</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="student-tab" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="false">Student</button>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                    <ul class="noti-list">
                      <li>
                        <a href="#">
                          <span>20 OCT, 2023</span>
                          <p>This is a demo notification</p>
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <span>20 OCT, 2023</span>
                          <p>This is a demo notification</p>
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <span>20 OCT, 2023</span>
                          <p>This is a demo notification</p>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane" id="student" role="tabpanel" aria-labelledby="student-tab">
                    <ul class="noti-list">
                      <li>
                        <a href="#">
                          <span>20 OCT, 2023</span>
                          <p>This is a demo notification</p>
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <span>20 OCT, 2023</span>
                          <p>This is a demo notification</p>
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <span>20 OCT, 2023</span>
                          <p>This is a demo notification</p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="dropdown d-inline-block open">
              <button class="dropdown-toggle d-inline-flex align-items-center bg-transparent border-0" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <figure class="mb-0 d-inline-flex align-items-center justify-content-center bg--dark">
                  <img src="{{ asset('assets/instructor/images/avatar.png') }}" alt="" width="56" height="56" class="w-100 h-100 object-fit-cover" />
                  <span class="text-white fw-medium d-none">SC</span>
                </figure>
              </button>
              <div class="dropdown-menu" aria-labelledby="accountDropdown">
                <a class="dropdown-item" href="{{route('my_courses')}}">Student Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="dropdown-item" href="javascript:;" onclick="parentNode.submit();">Logut</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </header>

      @yield('content')

      <div class="db__footer py-4">
        <p class="mb-0 fw-medium text--sm text-center">© Fintekin Dasboard | All Rights Reserved</p>
      </div>
  </div>

  <script src="{{ asset('assets/instructor/vendors/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/instructor/vendors/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://kit.fontawesome.com/2d537fef4a.js" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/instructor/vendors/owl-carousel-2.3.4/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/instructor/js/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>