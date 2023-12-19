<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon d-none" alt="logo icon" style="width: 160px;">
            <h5 class="text-center text-light">FintekIn</h5>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <!-- <li>
            <a href="{{ url('/') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li> -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">CMS</div>
            </a>
            <ul>
                <li> <a href="{{route('terms')}}"><i class="bx bx-right-arrow-alt"></i>Terms & Condition</a></li>
                <li> <a href="{{route('privacy')}}"><i class="bx bx-right-arrow-alt"></i>Privacy & Policy</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('banners.create')}}">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Banners</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Categories</div>
            </a>
            <ul>
                <li> <a href="{{route('categories.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li>
                <li> <a href="{{route('categories.index')}}"><i class="bx bx-right-arrow-alt"></i>View Category</a></li>

            </ul>
        </li>
        <li>
            <a href="{{ route('admin.get_students') }}">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Students</div>
            </a>
            <ul>
                <!-- <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li> -->

            </ul>
        </li>
        <li>
            <a href="{{ route('admin.get_instructorapproval') }}">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Verify Instructors</div>
            </a>
            <ul>
                <!-- <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li> -->

            </ul>
        </li>
        <li>
            <a href="{{ route('admin.get_instructors') }}">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Instructors</div>
            </a>
            <ul>
                <!-- <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li> -->

            </ul>
        </li>
        <li>
            <a href="{{route('courses.index')}}" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Course</div>
            </a>

        </li>

        <li>
            <a href="{{route('payment_withdrawl')}}" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Payment Withdrawal</div>
            </a>

        </li>

        <li>
            <a href="{{route('helps.index')}}" class="">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Help & Support</div>
            </a>

        </li>
        <li>
            <a href="{{route('adminprofile.index')}}" class="">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Profile Management</div>
            </a>

        </li>
        <!--end navigation-->
    </ul>
</div>