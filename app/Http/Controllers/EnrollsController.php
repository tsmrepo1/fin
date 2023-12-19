<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Course;
use Illuminate\Http\Request;


class EnrollsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coursees = Course::where('instructor_id', auth()->user()->id)->get();
        $parentcat =  json_decode(json_encode($coursees), true);
        return view('instructor.enrolled', ['alldata' => $parentcat]);
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


    }

    /**
     * Display the specified resource.
     */
    public function show(Enroll $enrolls)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enroll $enrolls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enroll $enrolls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enroll $enrolls)
    {
        //
    }
}
