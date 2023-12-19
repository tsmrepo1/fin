@extends('layouts.instructor')

@section('content')
<div class="db__content">
  <div class="help-support-form-wrap content-wrap">
    <div class="content-box has-h2--bold">
      <h2>Help & Support</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, alias.</p>
    </div>

    <form method="POST" action="{{route('help.store')}}">
      @csrf
      <div>
        <textarea name="hsf_issue" placeholder="Write your issue here..."></textarea>
      </div>
      <div>
        <select name="hsf_subject" id="hsf_subject">
          <option value="" selected disabled>Select Subject</option>
          <option value="course related">Course Related</option>
          <option value="withdrawl">Withdrawl Request</option>
          <option value="others">Others</option>
        </select>
      </div>
      <div id="orderwithdrawl" style="display: none;">
        <!-- Options for the dependent dropdown -->
        <select id="ordwid" name="ordwid">
    <option value="">Select an option</option>
</select>
    </div>
      <div class="text-end">
        <button type="submit" class="btn btn--primary">Submit</button>
      </div>
    </form>
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