<?php

namespace App\Http\Controllers;

use App\Models\CourseMeta;
use Illuminate\Http\Request;

class CourseMetaController extends Controller
{

    public function update(Request $request, string $id)
    {
        $course_meta = CourseMeta::find($id);

        $course_meta->things_to_learn   = $request->things_to_learn;
        $course_meta->requirements      = $request->requirements;
        $course_meta->target_audience   = $request->target_audience;

        if($course_meta->save()) {
            return redirect()->back();
            // return response()->json(["status" => "success", "message" => "Data saved"]);
        }
        else {
            // return redirect()->json(["status" => "failed", "message" => "Sorry! Something went wrong."]);
        }
    }
}
