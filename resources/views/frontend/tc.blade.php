@extends('layouts.app')

@section('content')
<div class="main__body__wrapp">
    <div class="header__banner__main header__banner__inner">
        <div class="image__box">
            <img alt="" src="{{asset('assets/frontend/images/innerbanner.jpg')}}" />
        </div>
        <div class="banner__content">
            <div class="container">
                <div class="row">
                    <h1>Terms and Conditions</span></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="what__you__wrapp">
        <div class="container">
            @if(is_null($data) == false)
            {!! $data !!}
            @endif
        </div>
    </div>
</div>
@stop