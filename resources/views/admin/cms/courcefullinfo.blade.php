<x-admin-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.css" />
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 100%;
            margin: 0 auto;
        }

        .card-text {
            font-size: 18px;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    display: none;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
}

input:checked + .slider {
    background-color: #2196F3;
}

input:checked + .slider:before {
    transform: translateX(26px);
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
                            <li class="breadcrumb-item active" aria-current="page">Cource Full Information</li>
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
                                <h5 class="mb-0 text-dark">Cource Full Information</h5>
                            </div>
                            <hr>


                            <?php
                            $courseMeta = $alldata['course_meta'];
                            $stat = $alldata['is_approved'];
                            $idd = $alldata['id'];
                            $checkedAttribute = $stat ? 'checked' : '';
                            $lrn = str_replace(['[', ']'], '', $courseMeta['things_to_learn']);
                            $reqq = str_replace(['[', ']'], '', $courseMeta['requirements']);
                            $tar = str_replace(['[', ']'], '', $courseMeta['target_audience']);
                            $thingsToLearn = explode(',', $lrn);
                            $requirements = explode(',', $reqq);
                            $targetaudi = explode(',', $tar);
                            ?>

                            <h5>You can learn here:</h5>
                            <input type="hidden" name="xxx" id="xxx" value="<?php echo $idd; ?>">
                            <?php
                            foreach ($thingsToLearn as $learnItem) {
                                echo '<p class="card-text">' . $learnItem . '</p>';
                            }
                            ?>

                            <h5>Requirements for the Course:</h5>
                            <?php
                            foreach ($requirements as $requirementItem) {
                                echo '<p class="card-text">' . $requirementItem . '</p>';
                            }
                            ?>
                            <h5>Target Audience:</h5>
                            <?php
                            foreach ($targetaudi as $targetting) {
                                echo '<p class="card-text">' . $targetting . '</p>';
                            }
                            ?>



                        </div>
                    </div>
                    

<div class="card border-top border-0 border-4 border-primary my-4">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                                <h5 class="mb-0 text-dark">Chapter & Lesson Information</h5>
                            </div>
                            <hr>
                            <?php
                            $chapters = $alldata['chapters']; 
                            foreach($chapters as $chaap) { ?>
                           <h3><?php echo $chaap['title'];?></h3>
                           <?php $lesson = $chaap['lessons']; ?>
                           <table>
        <thead>
            <tr>
                <th>Lesson Name</th>
                <th>Lesson Type</th>
                <th>Lesson Content</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lesson as $lesn) { ?>
            <tr>
                <td><?php echo $lesn['title'];?></td>
                <td><?php echo $lesn['content_type'];?></td>
                <td><button id="openModalBtn" onclick="openModal('<?php echo asset(Storage::url($lesn['content'])); ?>')">Show</button></td>
            </tr>
            

           <?php } ?>
        </tbody>
    </table>
    <?php } ?>
    
   
                        </div>
                    </div>
                    <h4>Approved / Not Approved</h4>
                    <label class="switch">
        <input type="checkbox" id="toggleSwitch" <?php echo $checkedAttribute; ?>>
        <span class="slider round"></span>
    </label>

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
// script.js
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("myModal");
    const modalContent = document.getElementById("modalContent");
    const videoSource = document.getElementById("videoSource");
    const toggleSwitch = document.getElementById("toggleSwitch");
   
    var X = 0;
    toggleSwitch.addEventListener("change", function () {
        const isChecked = toggleSwitch.checked;
        showSweetAlert(isChecked);

        
    });
    // Function to open the modal and receive data as an argument
    window.openModal = function (data) {
        // Display the data in the modal content
        window.open(data, '_blank');
    };

    // Function to close the modal
    window.closeModal = function () {
        modal.style.display = "none";
    };

    // Close the modal when the user clicks anywhere outside of it
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
function showSweetAlert(XX) {
    const inputField = document.getElementById("xxx");
    var id = inputField.value;
    Swal.fire({
        title: 'Cource Status Changing',
        text: 'Really You Want To Change The Status?',
        icon: 'warning', // 'success', 'error', 'info', 'warning', 'question'
        confirmButtonText: 'Yes',
        confirmButtonColor: '#3085d6',
        showCancelButton: true,
        cancelButtonText: 'No',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            
            

        if(XX){
            X = 1;
        }else{
            X = 0;
        }

        // Send an AJAX request to your Laravel route
        $.ajax({
            type: "POST",
            url: "{{route('stat.update')}}",
            data: { isChecked: X,idd: id,_token: '{{ csrf_token() }}' },
            success: function (response) {
                if(response.status=="Success"){
                    Swal.fire({
        title: 'Cource Status Changing',
        text: 'The Status of Course Has Been Changed',
        icon: 'success', // 'success', 'error', 'info', 'warning', 'question'
        confirmButtonText: 'OK',
        confirmButtonColor: '#3085d6',
        showCancelButton: true,
        cancelButtonText: 'Cancel',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = response.redirect;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Action Canceled', 'You clicked Cancel!', 'error');
        }
    });
                }
                
                
            },
            error: function (error) {
                console.error(error);
            }
        });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Action Canceled', 'You clicked Cancel!', 'error');
        }
    });
}
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

        function openModal(content) {
            var modal = document.getElementById('myModal');
          

           
            modal.style.display = 'block';
           
        }

        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById('myModal');
            var overlay = document.getElementById('myOverlay');

            modal.style.display = 'none';
            overlay.style.display = 'none';
        }
    </script>

</x-admin-layout>