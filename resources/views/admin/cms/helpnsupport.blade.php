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
                            <li class="breadcrumb-item active" aria-current="page">T&C</li>
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
                                <h5 class="mb-0 text-dark">Help and Support</h5>
                            </div>
                            <hr>
                            <div class="container mt-5">
                            <table  class="table table-bordered">
        <thead>
            <tr>
                <th>Subject of Issue</th>
                <th>Message for Issue</th>
                <th>Amount</th>
                <th>Withdrawl Request Date</th>
                <th>Sending By</th>
                <th>Sender</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($support as $sup) { ?>
            <tr>
                <td>{{$sup['subject']}}</td>
                <td>{{$sup['issues']}}</td>
                <td>{{'$'.$sup['Amount']}}</td>
                <td>{{$sup['Datee']}}</td>
                <td>{{$sup['name']}}</td>
                <td>{{$sup['created_tag']}}</td>
                <td>{{$sup['created_at']}}</td>
                <td>
    <div class="btn-group" role="group">
        <a href="{{ route('helps.show', $sup['id']) }}" class="btn btn-sm btn-success mx-1">View</a>
        <?php  if ($sup['subject'] == "withdrawl") { if($sup['tra'] <> 1) { ?>
            <a href="{{ route('refund.done', $sup['tran_id']) }}" class="btn btn-sm btn-success mx-1">Refund</a>
        <?php }} ?>
    </div>
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
    </div>
    <!--end page wrapper -->
    @include('admin.inc.footer')
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script> --}}
    <script>
        

    </script>
    
</x-admin-layout>