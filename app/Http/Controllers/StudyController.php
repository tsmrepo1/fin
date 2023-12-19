<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    public function learn(Request $request)
    {
        $has_access = Enroll::where(["student_id" => auth()->user()->id, "course_id" => $request->course_id])->first();

        if (!$has_access) {
            echo "No Access";
            return;
        }

        $menus = $this->get_menus();
    
        $course = Course::find($request->course_id);
        $chapters = [];

        $course_chapters = Chapter::where("course_id", $course->id)->get();
        foreach ($course_chapters as $chapter) {
            $chapter->lessons = Lesson::where("chapter_id", $chapter->id)->get();
            $chapters[] = $chapter;
        }

        $course->chapters = $chapters;

        if($request->has("lesson_id")) 
        {
            $lesson = Lesson::find($request->lesson_id);
        }
        else 
        {
            $chapter = Chapter::where("course_id", $request->course_id)->first();
            $lesson = Lesson::where("chapter_id", $chapter->id)->first();
        }

        $details = DB::select("select GROUP_CONCAT(forums.id SEPARATOR ', ') AS idds,lessons.title from forums inner join lessons on forums.lesson_id = lessons.id where lessons.id =? group by lessons.id,lessons.title", [$lesson->id]);
        $messeges  = json_decode(json_encode($details), true); 
        $arr[''] = array();
        foreach($messeges as $value){
           $arr1['speeches'] = array();
           
           $allidd = explode(", ", $value['idds']);
           foreach ($allidd as $rel) {
            $messthrd = DB::select("select users.name sender,usu.id receiver,forummessages.message,forummessages.created_at,forummessages.forum_id from forummessages INNER join users on forummessages.fr_id = users.id inner join users usu on forummessages.to_id = usu.id where forummessages.forum_id = ? and forummessages.stat=1", [$rel]);
           foreach ($messthrd as $thrd) {
             $arr2["Main_Ques"] = array();
             $arr2["Sender"] = $thrd->sender;
             $arr2["Receiver"] = $thrd->receiver;
             $arr2["Message"] = $thrd->message;
             $arr2["Created"] = $thrd->created_at;
             
             $rrz = DB::select("select users.name sender,usu.id receiver,forummessages.message,forummessages.created_at,forummessages.forum_id from forummessages INNER join users on forummessages.fr_id = users.id inner join users usu on forummessages.to_id = usu.id where forummessages.forum_id = ? and forummessages.stat<>1", [$rel]);
             foreach ($rrz as $ddd) {
              $arr3 = [];  
              $arr3["Sender"] = $ddd->sender;
             $arr3["Receiver"] = $ddd->receiver;
             $arr3["Message"] = $ddd->message;
             $arr3["Created"] = $ddd->created_at;
             array_push($arr2['Main_Ques'], $arr3);
             }
             array_push($arr1['speeches'], $arr2);
           }
           
           }
           
            array_push($arr[''], $arr1);
         }
         
         dd($arr);
        

        return view("frontend.study", ["course" => $course, "lesson" => $lesson, "menus" => $menus]);
    }

    public function lesson_mark_as_complete(Request $request)
    {

    }

    public function lesson_mark_as_incomplete(Request $request)
    {
        
    }

    public function check_access(Request $request) {

    } 

    public function get_menus()
    {
        $menu['category'] = array();
        $all = Category::where('parent_id', 0)->get()->toArray();
        foreach ($all as $value) {
            $arr1['subcat'] = array();
            $arr1["id"] = $value['id'];
            $arr1["title"] = $value['name'];
            $arr1["desc"] = $value['description'];
            $arr1["iamge"] = $value['image'];
            $bll = Category::where('parent_id', $value['id'])->get()->toArray();
            foreach ($bll as $vell) {
                $arr2 = [];
                $arr2["sub_id"] = $vell['id'];
                $arr2["sub_title"] = $vell['name'];
                $arr2["sub_desc"] = $vell['description'];
                $arr2["sub_image"] = $vell["image"];
                array_push($arr1['subcat'], $arr2);
            }
            array_push($menu['category'], $arr1);
        }
        return $menu;
    }
}




// $data = [
//     ["permission" => "can_create_vehicle", "user_id" => $user->id],
//     ["permission" => "can_view_vehicle", "user_id" => $user->id],
//     ["permission" => "can_edit_vehicle", "user_id" => $user->id],
//     ["permission" => "can_delete_vehicle", "user_id" => $user->id],

//     ["permission" => "can_create_broker", "user_id" => $user->id],
//     ["permission" => "can_view_broker", "user_id" => $user->id],
//     ["permission" => "can_edit_broker", "user_id" => $user->id],
//     ["permission" => "can_delete_broker", "user_id" => $user->id],

//     ["permission" => "can_create_client", "user_id" => $user->id],
//     ["permission" => "can_view_client", "user_id" => $user->id],
//     ["permission" => "can_edit_client", "user_id" => $user->id],
//     ["permission" => "can_delete_client", "user_id" => $user->id],

//     ["permission" => "can_create_workorder", "user_id" => $user->id],
//     ["permission" => "can_view_workorder", "user_id" => $user->id],
//     ["permission" => "can_edit_workorder", "user_id" => $user->id],
//     ["permission" => "can_delete_workorder", "user_id" => $user->id],

//     ["permission" => "can_create_product", "user_id" => $user->id],
//     ["permission" => "can_view_product", "user_id" => $user->id],
//     ["permission" => "can_edit_product", "user_id" => $user->id],
//     ["permission" => "can_delete_product", "user_id" => $user->id],

//     ["permission" => "can_create_fuelstation", "user_id" => $user->id],
//     ["permission" => "can_view_fuelstation", "user_id" => $user->id],
//     ["permission" => "can_edit_fuelstation", "user_id" => $user->id],
//     ["permission" => "can_delete_fuelstation", "user_id" => $user->id],

//     ["permission" => "can_create_cash", "user_id" => $user->id],
//     ["permission" => "can_view_cash", "user_id" => $user->id],
//     ["permission" => "can_edit_cash", "user_id" => $user->id],
//     ["permission" => "can_delete_cash", "user_id" => $user->id],

//     ["permission" => "can_create_loading", "user_id" => $user->id],
//     ["permission" => "can_view_loading", "user_id" => $user->id],
//     ["permission" => "can_edit_loading", "user_id" => $user->id],
//     ["permission" => "can_delete_loading", "user_id" => $user->id],

//     ["permission" => "can_create_unloading", "user_id" => $user->id],
//     ["permission" => "can_view_unloading", "user_id" => $user->id],
//     ["permission" => "can_edit_unloading", "user_id" => $user->id],
//     ["permission" => "can_delete_unloading", "user_id" => $user->id],

//     ["permission" => "can_payment_entry_broker", "user_id" => $user->id],
//     ["permission" => "can_payment_view_broker", "user_id" => $user->id],
//     ["permission" => "can_payment_due_broker", "user_id" => $user->id],
//     ["permission" => "can_view_report_broker", "user_id" => $user->id],
//     ["permission" => "can_view_ledger_broker", "user_id" => $user->id],

//     ["permission" => "can_create_bill_client", "user_id" => $user->id],
//     ["permission" => "can_view_bill_client", "user_id" => $user->id],
//     ["permission" => "can_view_unbilled_trips_client", "user_id" => $user->id],
//     ["permission" => "can_payment_receipt_entry_client", "user_id" => $user->id],
//     ["permission" => "can_view_payment_client", "user_id" => $user->id],

//     ["permission" => "can_payment_fuelstation", "user_id" => $user->id],
//     ["permission" => "can_extra_fuelentry_fuelstation", "user_id" => $user->id],
//     ["permission" => "can_view_payment_fuelstation", "user_id" => $user->id],
//     ["permission" => "can_view_ledger_fuelstation", "user_id" => $user->id],

//     ["permission" => "can_view_cashbook_cash", "user_id" => $user->id],
//     ["permission" => "can_create_transaction_cash", "user_id" => $user->id],
//     ["permission" => "can_view_cashbook_ledger_cash", "user_id" => $user->id],

//     ["permission" => "can_create_bill_owner", "user_id" => $user->id],
//     ["permission" => "can_view_bill_owner", "user_id" => $user->id],
//     ["permission" => "can_create_payment_owner", "user_id" => $user->id],
//     ["permission" => "can_payment_view_owner", "user_id" => $user->id],
//     ["permission" => "can_view_unbilled_trips_owner", "user_id" => $user->id],
// ];
            
