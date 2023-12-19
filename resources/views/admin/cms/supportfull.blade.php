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

        .time-left {
  float: left;
  color: #999;
}
.time-right {
  float: right;
  color: #aaa;
}
.right{
    color: red;
}
.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #BFFAF9;
  padding: 30px;
  color: #000;
}
.self{
    text-align: right;
    
}
.all{
    color: red;
    text-align: right;
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
                                <h5 class="mb-0 text-dark">Conversation on Support</h5>
                            </div>
                            <hr>

                            <div class="container mt-5">
                                <?php foreach($support as $mes) { 
                                    if($mes['name']!== null) {
                                    ?>

                                <div class="container darker">
                                    <p>{{$mes['message']}}</p>
                                    <p class="right">{{$mes['name']}}</p>
                                    <span class="time-left">{{$mes['created_at']}}</span>
                                </div>
                                <?php  } else { ?>
                                    <div class="container darker">
                                    <p class="self">{{$mes['message']}}</p>
                                    <p class="all">Admin</p>
                                    <span class="time-right">{{$mes['created_at']}}</span>
                                </div>
<?php } } ?>
                        </div>
                        <div class="container mt-4">
    <form action="{{route('helps.store')}}" method="POST">
        @csrf
    <?php foreach($support as $mes){ ?>
        <input type="hidden" name="idd" value="<?php echo $mes['ticket_id']; ?>">
        <?php } ?>
       
    <textarea name="message" id="message" class="form-control" rows="4" placeholder="Type your message here"></textarea>
        <button type="submit" class="btn btn-primary mt-2">Send</button>
    </form>
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