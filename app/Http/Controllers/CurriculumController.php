<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Curriculum;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CurriculumController extends Controller
{
    public function create_chapter(Request $request) 
    {
        $chapter = new Chapter();
        $chapter->course_id = $request->course_id;
        $chapter->title = "Chapter Title";
        
        
        if($chapter->save())
        {
            $lesson = new Lesson();
            $lesson->chapter_id = $chapter->id;
            $lesson->save();
            
            return response()->json(["status" => "success", "message" => "New chapter is created", "chapter" => $chapter, "lesson" => $lesson], 200);
        }
        else 
        {
            return response()->json(["status" => "failed", "message" => "Chapter creation failed", "chapter" => null], 500);
        }
    }


    public function create_lesson(Request $request)
    {
        $lesson = new Lesson();
        $lesson->chapter_id = $request->chapter_id;

        if ($lesson->save()) {
            return response()->json(["status" => "success", "message" => "New Lesson is created", "lesson" => $lesson], 200);
        } else {
            return response()->json(["status" => "failed", "message" => "Lesson creation failed", "lesson" => null], 500);
        }
    }


    public function delete_chapter(Request $request)
    {
        if(Chapter::destroy($request->chapter_id)) 
        {
            Lesson::where("chapter_id", $request->chapter_id)->delete();

            return response()->json(["status" => "success", "message" => "Chapter deleted"], 200);
        }
        else
        {
            return response()->json(["status" => "failed", "message" => "Chapter deletaion failed"], 500);
        }
    }


    public function delete_lesson(Request $request)
    {
        if(Lesson::destroy($request->lesson_id))
        {
            return response()->json(["status" => "success", "message" => "Lesson deleted"], 200);
        }
        else
        {
            return response()->json(["status" => "failed", "message" => "Lesson deletaion failed"], 500);
        }
    }

    public function update_chapter_title(Request $request)
    {
        $chapter = Chapter::find($request->chapter_id);
        $chapter->title  = $request->chapter_title;
        
        if($chapter->save())  
        {
            return response()->json(["status" => "success", "message" => "Chapter title updated", "chapter" => $chapter], 200);
        }
        else
        {
            return response()->json(["status" => "failed", "message" => "Chapter title updation failed"], 500);  
        }
    }

    public function update_lesson_title(Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);
        $lesson->title  = $request->lesson_title;

        if ($lesson->save()) 
        {
            return response()->json(["status" => "success", "message" => "Lesson title updated", "lesson" => $lesson], 200);
        } 
        else 
        {
            return response()->json(["status" => "failed", "message" => "Lesson title updation failed"], 500);
        }
    }

    public function update_lesson_content(Request $request)
    {
        $lesson = Lesson::find($request->lesson_id);

        $video = $request->file('content');
        $fileName = time() . '.' . $video->getClientOriginalExtension();
        $video->storeAs('videos', $fileName, 'public');

        $lesson->content_type = $video->getClientMimeType();
        $lesson->content = 'videos/'.$fileName; 

        if($lesson->save())
        {
            return response()->json(["status" => "success", "message" => "Video Uploaded", "lesson" => $lesson], 200);
        }
        else
        {
            return response()->json(["status" => "failed", "message" => "Video Uploading Failed"], 500);
        }
    }
}
