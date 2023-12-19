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
                                <h5 class="mb-0 text-dark">Category Management</h5>
                            </div>
                            <hr>
                            <form method="POST" enctype="multipart/form-data" action="{{route('categories.store')}}">
                            @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
    <label for="category">Select a category:</label>
<select id="categories" name="category" class="form-control">
<option value="">Select An Option</option>
    <?php foreach($parenting as $value) { ?>
    <option value=<?php echo $value['id'];?>><?php echo $value['name']; ?></option>
    <?php } ?>
</select>
    </div>
    <div class="form-group">
    <label for="category">Upload an Image</label>
    <input type="file" id="imageInput" class="form-control" name="imageInput" accept="image/*" onchange="previewImage(event)">
    <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100%; max-height: 300px;">
    </div>
    <div class="form-group">
        <label for="content">Description</label>
        <textarea name="content" id="content" class="form-control ckeditor"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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
        CKEDITOR.replace('content');
        function previewImage(event) {
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    if (imageInput.files && imageInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
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