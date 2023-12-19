<x-admin-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.css" />
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
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto;
        }

        .user-details {
            text-align: center;
            margin-top: 20px;
        }

        .bio {
            margin-top: 30px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
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
                            <li class="breadcrumb-item active" aria-current="page">View and Edit Profile</li>
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
                                <h5 class="mb-0 text-dark">Profile Management</h5>
                            </div>
                            <hr>
                            
                              <div class="container">
                                  <?php foreach ($alldata as $value) { ?>
        <div style="text-align: center;">
    <img src="<?php echo asset(Storage::url($value['profile_pic'])); ?>" width="100" height="100">
</div>
        <div class="user-details">
            <h1>{{$value['name']}}</h1>
            <p>Email: {{$value['email']}}</p>
        </div>

        <div class="change-password">
            <h2>Change Password</h2>
            <form method="POST" action="{{route('adminprofile.update',auth()->user()->id)}}">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" name="current_password" class="form-control" id="current-password" required>
                    
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="new-password" required>
                </div>
                <div class="form-group">
                    <label for="new-password">Confirm New Password</label>
                    <input type="password" name="cnf_password" class="form-control" id="cnf-password" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>

        <div class="upload-picture">
            <h2>Upload Profile Picture</h2>
            <form method="POST" enctype="multipart/form-data" action="{{route('adminprofile.setpic')}}">
            @csrf
                <div class="form-group">
                    <label for="profile-picture">Choose a picture</label>
                    <input type="file" class="form-control-file" name="picture" accept="image/*">
                    <input type="hidden" value="{{auth()->user()->id}}" class="form-control-file" name="idd">
                </div>
                <button type="submit" class="btn btn-primary">Upload Picture</button>
            </form>
        </div>
                                  <?php } ?>
    </div>

                                
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    @include('admin.inc.footer')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <script>
        CKEDITOR.replace('content');

        function addForm() {
            const tbody = document.getElementById("tbody");
            const row = document.getElementById("row");
            const clonedRow = row.cloneNode(true);

            // Clear input fields in the cloned form
            const inputFields = clonedRow.querySelectorAll("input");
            inputFields.forEach(input => {
                input.value = "";
            });

            // Append the cloned form to the form
            tbody.appendChild(clonedRow);
        }

        $(document).on("click", ".removeRow", function(event) {
            $(this).parent().parent().parent().parent().remove()
        })

        function previewImage(event) {
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.style.display = 'block';
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(imageInput.files[0]);
            } else {
                imagePreview.style.display = 'none';
            }
        }
    </script>

</x-admin-layout>