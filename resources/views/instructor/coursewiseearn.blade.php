@extends('layouts.instructor')

@section('content')
<div class="db__content">
  <div class="help-support-form-wrap content-wrap">
    <div class="content-box has-h2--bold">
      <h2>Course Wise Earning</h2>
          </div>

    <div class="container mt-5">
                            <table  class="table table-bordered">
        <thead>
            <tr>
                                                <th>Cource Thumbnal</th>
                                                <th>Cource Title</th>
                                                <th>Cource Language</th>
                                                <th>Cource Type</th>
                                                <th>Enrolled/Purchased</th>
                                                <th>Total Income</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($support as $sup) { ?>
            <tr>
            <td>
                                                <img src="{{asset(Storage::url($sup->thumbnail))}}" width="100" height="100" alt="Image Preview">
                                                </td>
                                               
                <td>{{$sup->title}}</td>
                <td>{{$sup->language}}</td>
                <td>{{$sup->level}}</td>
                <td>{{$sup->countt}}</td>
                <td>{{"$".$sup->total}}</td>
            </tr>
            <?php } ?>
           
        </tbody>
    </table>
    </div>
  </div>
</div>
@stop