@extends('layouts.instructor')
<style>
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
@section('content')
<div class="db__content">
  <div class="help-support-form-wrap content-wrap">
    <div class="content-box has-h2--bold">
      <h2>Forum Based Discussion</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, alias.</p>
    </div>

    <div class="container mt-5">
                                <?php foreach($heads as $mes) { 
                                    if($mes['receiver']!= auth()->user()->name) {
                                    ?>

                                <div class="container darker">
                                    <p class="self">{{$mes['message']}}</p>
                                    <p class="all">{{$mes['sender']}}</p>
                                    <span class="time-right">{{$mes['created_at']}}</span>
                                </div>
                                <?php  } else { ?>
                                    <div class="container darker">
                                    <p>{{$mes['message']}}</p>
                                    <p class="right">{{$mes['sender']}}</p>
                                    <span class="time-left">{{$mes['created_at']}}</span>
                                </div>
<?php } } ?>
                        </div>
                        <div class="container mt-4">
                        <form action="{{route('instrunctor.reply')}}" method="POST">
        @csrf
    <?php foreach($heads as $mes){ ?>
        <input type="hidden" name="idd" value="<?php echo $mes['forum_id']; ?>">
        <?php } ?>
       
    <textarea name="message" id="message" class="form-control" rows="4" placeholder="Type your message here"></textarea>
        <button type="submit" class="btn btn-primary mt-2">Send</button>
    </form>
</div>
  </div>
</div>
@stop