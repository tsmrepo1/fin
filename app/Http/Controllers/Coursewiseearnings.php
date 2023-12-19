<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Support\Facades\DB;

class Coursewiseearnings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = "select courses.thumbnail,courses.title,courses.language,courses.level,B.countt,B.total from courses inner join (SELECT sum(order_metas.amount) total,order_metas.course_id,count(order_metas.course_id) countt FROM order_metas inner join orders on orders.id = order_metas.order_id where orders.payment_status='PAID' group by order_metas.course_id) B on courses.id = B.course_id where courses.instructor_id =?";

         $results = DB::select($query, [auth()->user()->id]);
         return view('instructor.coursewiseearn', ['support' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
