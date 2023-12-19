<?php

namespace App\Http\Controllers;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\CourseMeta;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $course = Course::find($id);
        $course->course_meta = CourseMeta::where("course_id", $id)->first();
        $chapters = [];

        $course_chapters = Chapter::where("course_id", $course->id)->get();
        foreach($course_chapters as $chapter) 
        {
            $chapter->lessons = Lesson::where("chapter_id", $chapter->id)->get();
            $chapters[] = $chapter;
        }

        $course->chapters = $chapters;
        $parentcat =  json_decode(json_encode($course), true);
         return view('admin.cms.courcefullinfo', ['alldata' => $course]);
        
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

    public function updatecoursestat(Request $request){
        DB::table('courses')
        ->where('id', $request->idd) // Specify the condition
        ->update(['is_approved' =>$request->isChecked ]);

        $response = [
            'redirect' => route('courses.index'),
            'status'=>'Success' // Replace 'target.route' with the actual route name
        ];

        return response()->json($response);
    }
}
