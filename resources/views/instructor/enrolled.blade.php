@extends('layouts.instructor')

@section('content')
<div class="db__content">
  <div class="help-support-form-wrap content-wrap">
    <div class="content-box has-h2--bold">
      <h2>Help & Support</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, alias.</p>
    </div>

    <div class="table-responsive">
                                <table  class="table table-bordered">
        <thead>
        <tr>
                                                <th>Cource Thumbnal</th>
                                                <th>Cource Title</th>
                                                <th>Cource Language</th>
                                                <th>Cource Type</th>
                                                
                                            </tr>
        </thead>
        <tbody class="tabbb">
            <?php foreach($alldata as $crs) { ?>
                <tr>
                                                <td>
                                                <img src="{{asset(Storage::url($crs['thumbnail']))}}" width="100" height="100" alt="Image Preview">
                                                </td>
                                                <td>
                                                    {{$crs['title']}}
                                                </td>
                                                
                                                
                                                <td>
                                                    {{$crs['language']}}
                                                </td>
                                                <?php if($crs['price_type']=="FREE") { ?>
                                                <td>
                                                    {{"Free"}}
                                                </td>
                                                <?php } else {?>
                                                <td>
                                                    {{'$'.$crs['price']}}
                                                </td>
                                                <?php } ?>
                                                
            <tr>
            <td colspan="3">
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>Order ID</th>
            <th>Student Name</th>
                <th>Enrolled for the course</th>
                </tr>
                </thead>
                <tbody class="tabb">
           <?php
            
             $resulting = DB::table('enrolls')->join('users','users.id','=','enrolls.student_id')->select('enrolls.*','users.name')->where('enrolls.course_id', $crs['id'])->get();
             $subcat =  json_decode(json_encode($resulting), true);
             if(sizeof($subcat)>0) {
             foreach ($subcat as $sub) {

            ?>
            <tr>
            <td>{{$sub['order_id']}}</td>
            <td>{{$sub['name']}}</td>
                <td>{{$sub['created_at']}}</td>
                
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
@stop