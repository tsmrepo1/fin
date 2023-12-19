@extends('layouts.instructor')

@section('content')
<div class="db__content">
  <div class="help-support-form-wrap content-wrap">
    <div class="content-box has-h2--bold">
      <h2>Help & Support</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, alias.</p>
    </div>

    <div class="container mt-5">
                            <table  class="table table-bordered">
        <thead>
            <tr>
                <th>Subject of Issue</th>
                <th>Message for Issue</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($support as $sup) { ?>
            <tr>
                <td>{{$sup['subject']}}</td>
                <td>{{$sup['issues']}}</td>
                <td>{{$sup['created_at']}}</td>
                <td>
                                                <a href="{{route('help.show',$sup['id'])}}" class="btn btn-sm btn-success mx-1">View</a>
                                                    
                                                </td>
            </tr>
            <?php } ?>
           
        </tbody>
    </table>
    </div>
  </div>
</div>
@stop