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
        .tabb {
            background-color: lightgreen; /* Set the background color for the table body */
        }
        .tabbb {
            background-color: lightcyan; 
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
                            <li class="breadcrumb-item active" aria-current="page">Cource Preview</li>
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
                                <h5 class="mb-0 text-dark">Category Preview</h5>
                            </div>
                            <hr>
                            
                                <div class="table-responsive">
                                <table  class="table table-bordered">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Category Image</th>
                
            </tr>
        </thead>
        <tbody class="tabbb">
            <?php foreach($parenting as $parent) { ?>
            <tr>
                <td>{{$parent['name']}}</td>
                <td>{{$parent['description']}}</td>
                <td>
                <img src="{{asset(Storage::url($parent['image']))}}" width="100" height="100" alt="Image Preview">
                </td>
               
            </tr>
            <tr>
            <td colspan="3">
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>Child Category Name</th>
                <th>Child Category Description</th>
                <th>Child Category Image</th>
                </tr>
                </thead>
                <tbody class="tabb">
           <?php
            
             $resulting = DB::table('categories')->select('*')->where('parent_id', $parent['id'])->get();
             $subcat =  json_decode(json_encode($resulting), true);
             if(sizeof($subcat)>0) {
             foreach ($subcat as $sub) {

            ?>
            <tr>
            <td>{{$sub['name']}}</td>
                <td>{{$sub['description']}}</td>
                <td>
                <img src="{{asset(Storage::url($sub['image']))}}" width="100" height="100" alt="Image Preview"></td>
                </tr>

               <?php } } ?>

            </tbody>
            </table>
            </td>
            </tr>
            <?php } ?>
            
            <!-- Add more rows as needed -->
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