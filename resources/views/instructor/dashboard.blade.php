@extends('layouts.instructor')

@section('content')
<div class="db__content">
    @php

    $mid = DB::table('instructorregistration')->where('status', 1)->where('user_id',auth()->user()->id)->get();$fin = DB::table('instructorregistration')->where('status', 2)->where('user_id',auth()->user()->id)->get();
    $prec = $mid->count();

    @endphp
    <?php if($prec==1){ ?>
        <h3>YOUR REGISTRATION IS STILL UNDER REVIEW BY ADMIN, AS SOON AS IT WILL APPROVED, YOU CAN ACCESS THE REST</h3>

        <?php } else { ?>
    <div class="text-end mb-4">
        <a href="{{ route('course.create') }}" class="btn btn--primary btn--add-course"><i class="fa-solid fa-plus me-2"></i>Add Course</a>
    </div>
<?php } ?>
    <ul class="courses-list">
        @foreach($courses as $course)
        <li>
            <div class="db-course-card bg--body">
                <figure class="db-course-card__thumbnail position-relative ratio ratio-1x1">
                    <a href="#" target="_blank">
                        <img src="{{asset(Storage::url($course->thumbnail))}}" alt="" class="w-100 h-100 object-fit-cover" />
                    </a>
                </figure>
                <div class="db-course-card__body">
                    @if($course->price_type == "FREE")
                    <p class="db-course-card__type text-uppercase fw-medium db-course-card__type--free">Free</p>
                    @endif

                    @if($course->price_type == "PAID")
                    <p class="db-course-card__type text-uppercase fw-medium db-course-card__type--free">Paid</p>
                    @endif

                    <h5 class="db-course-card__title fw-semibold"><a href="#" target="_blank" class="line-clamp line-clamp--2">{{ $course->title }}</a></h5>

                    @if($course->price_type == "FREE")
                    <p class="db-course-card__price fw-semibold"><span class="selling-price me-2">FREE</span></p>
                    @endif

                    @if($course->price_type == "PAID")
                    <p class="db-course-card__price fw-semibold"><span class="selling-price me-2">{{ "$".$course->sale_price }}</span><span class="regular-price text-decoration-line-through">{{ "$".$course->price }}</span></p>
                    @endif

                    <div class="d-flex flex-wrap flex-md-nowrap d-none">
                        <p class="fw-medium me-3 mb-0 db-course-card__students d-inline-flex align-items-center"><i class="fa-solid fa-user"></i>Enrolled Student: <strong>100</strong></p>
                        <p class="d-none fw-medium mb-0 db-course-card__earnings d-inline-flex align-items-center"><i class="fa-solid fa-money-bill"></i>Earnings: <strong>$1000.00</strong></p>
                    </div>

                    <div class="db-course-card__cta-wrap d-flex">
                        <a href="{{ route('course.edit', $course->id) }}" class="db-course-card__edit py-1 px-4 mx-1"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                        <form method="POST" action="{{ route('course.destroy', $course->id) }}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="db-course-card__remove"><i class="fa-solid fa-trash"></i>Remove</button>
                        </form>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@stop