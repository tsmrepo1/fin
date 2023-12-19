<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\CourseMeta;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cources = Course::join('categories','courses.category_id','=','categories.id')->select('courses.*','categories.name')->get();
        $parentcat =  json_decode(json_encode($cources), true);
        return view('admin.cms.courcebrief', ['alldata' => $parentcat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select("id", "name")->where("parent_id", 0)->get();
        return view("instructor.course.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();
    
        $course->instructor_id = auth()->user()->id;
        $course->title = $request->title;
        $course->subtitle = $request->subtitle;
        $course->language = $request->language;
        $course->level = $request->level;
        $course->category_id = $request->category_id;
        $course->price_type = $request->price_type;

        if($request->price_type == "PAID") {
            $course->price = $request->price;
            $course->sale_price = $request->sale_prices;
        }

        if ($request->file('thumbnail')->isValid()) {
            $course->thumbnail = $request->file('thumbnail')->store('thumbnail', 'public');
        }
        
        if($course->save()) {
            CourseMeta::create(["course_id" => $course->id]);

            $request->session("success", "New course has been created");
            return redirect()->route("course.edit", $course->id);
        }
        else {
            $request->session("error", "Sorry! Something went wrong.");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(course $course)
    {
        $categories = Category::select("id", "name")->where("parent_id", 0)->get();
        $course_meta = CourseMeta::where("course_id", $course->id)->first();
        $chapters = [];

        $course_chapters = Chapter::where("course_id", $course->id)->get();
        foreach ($course_chapters as $chapter) {
            $chapter->lessons = Lesson::where("chapter_id", $chapter->id)->get();
            $chapters[] = $chapter;
        }

        $course->chapters = $chapters;

        return view("instructor.course.create", ["categories" => $categories, "course" => $course, "course_meta" => $course_meta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course $course)
    {
        $categories = Category::select("id", "name")->where("parent_id", 0)->get();

        $course_meta = CourseMeta::where("course_id", $course->id)->first();
        $chapters = [];

        $course_chapters = Chapter::where("course_id", $course->id)->get();
        foreach ($course_chapters as $chapter) {
            $chapter->lessons = Lesson::where("chapter_id", $chapter->id)->get();
            $chapters[] = $chapter;
        }

        $course->chapters = $chapters;

        return view("instructor.course.edit", ["categories" => $categories, "course" => $course, "course_meta"  => $course_meta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, course $course)
    {
        $records = DB::table("courses")
            ->join("curriculum", "curriculum.id", "=", "curriculum.id")
            ->get();
        

        dd($records);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        //
    }
}
