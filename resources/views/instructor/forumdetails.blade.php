@extends('layouts.instructor')

@section('content')
<div class="db__content">
  <div class="help-support-form-wrap content-wrap">
    <div class="content-box has-h2--bold">
      <h2>Forum Details</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, alias.</p>
    </div>

   <table  class="table table-bordered">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Chapter Name</th>
                <th>Lesson Name</th>
                <th>Question</th>
                <th>Sending By</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($questions as $qus) { ?>
            <tr>
                <td>{{$qus['course']}}</td>
                <td>{{$qus['chapter']}}</td>
                <td>{{$qus['lesson']}}</td>
                <td>{{$qus['message']}}</td>
                <td>{{$qus['name']}}</td>
                <td>{{$qus['created_at']}}</td>
                 <td>
    <div class="btn-group" role="group">
        <a href="{{ route('forum.details', $qus['id']) }}" class="btn btn-sm btn-success mx-1">View</a>
        
    </div>
</td>
            </tr>
            <?php } ?>
           
        </tbody>
    </table>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // When the page is ready
    $(document).ready(function() {
        // Get references to the trigger and dependent dropdowns
const triggerDropdown = document.getElementById('hsf_subject');
const dependentDropdown = document.getElementById('orderwithdrawl');


// Listen for changes in the trigger dropdown
triggerDropdown.addEventListener('change', function () {
    if (triggerDropdown.value === 'withdrawl') {
      $.ajax({
            url: '{{route("instructor_withdrawl")}}', // The route you defined
            type: 'GET',
            success: function (data) {
                // Populate the dropdown with the options received from the server
                var dropdown = $('#ordwid');
                dropdown.empty();
                dropdown.append('<option value="">Select an option</option>');
                $.each(data, function (key, value) {
                    dropdown.append('<option value="' + value.id + '">$' + value.reference+ '</option>');
                });
            }
        });
        dependentDropdown.style.display = 'block';
    } else {
        // Hide the dependent dropdown for any other value
        dependentDropdown.style.display = 'none';
    }
});



    });
</script>
@stop