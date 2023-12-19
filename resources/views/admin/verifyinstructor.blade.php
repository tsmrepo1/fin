<x-admin-layout>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.css"> --}}
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <!--sidebar wrapper -->
    @include('admin.inc.sidebar')
    <!--end sidebar wrapper -->

    <!--start header -->
    @include('admin.inc.header')
    <!--end header -->

    <style>
        .is-invalid {
            border-color: red;
        }
    </style>
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">CMS</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Privacy & Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!--end breadcrumb-->
            <div class="row row-cols-1 row-cols-1">
                <div class="col">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                                <h5 class="mb-0 text-dark">All Instructors Request</h5>
                            </div>
                            <hr>
                            <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Instructor Name</th>
                                                <th>Instructor Designation</th>
                                                <th>Instructor Current Job</th>
                                                <th>Instructor Qualification</th>
                                                <th>Instructor Specialization</th>
                                                <th>Instructor Teaching Experience</th>
                                                <th>Instructor Certificate</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody id="tbody1">
                                            <?php foreach ($instructors as $value) { ?>
                                                <tr>
                                                    <td>{{$value['name']}}</td>
                                                    <td>{{$value['desig']}}</td>
                                                    <td>{{$value['working']}}</td>
                                                    <td>{{$value['last_qualified']}}</td>
                                                    <td>{{$value['spec']}}</td>
                                                    <td>{{$value['exp']}}</td>
                                                    <td>
                                                    <iframe src="{{ asset('instructorcertificate/' . $value['certificate']) }}" width="100%" height="300px"></iframe></td>
                                                    <td>
                                                <a href="{{route('instructor_approving',$value['user_id'])}}" class="btn btn-sm btn-success mx-1">Approve</a>
                                                    
                                                </td>
                                                    
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    @include('admin.inc.footer')
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script> --}}
    <script>
        CKEDITOR.replace('content');
    </script>
</x-admin-layout>