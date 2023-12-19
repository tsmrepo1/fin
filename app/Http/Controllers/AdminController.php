<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\User;
use App\Models\Refund;
use App\Models\Transaction;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function get_students(Request $request)
    {
        $students = Enroll::select("student_id")->get()->toArray();
        $users = User::whereIn("id", $students)->get();

        $records = [];
        foreach ($users as $user) {
            $user->enrolls =  Enroll::where("student_id", $user->id)->count();
            $records[] = $user;
        }
        //dd($records);
        return view('admin.students', ["studentcource" => $records]);
    }

    public function approving($id){
        DB::update('UPDATE instructorregistration SET status = 2 WHERE user_id = ?', [
            $id,
           
        ]); 
        $ss = DB::select("select users.name,instructorregistration.* from instructorregistration inner join users on instructorregistration.user_id = users.id where instructorregistration.status = 1");
        $courcelist = json_decode(json_encode($ss), true);

        return view('admin.verifyinstructor', ["instructors" => $courcelist]);
    }

    public function get_instructors()
    {
        $totalinc = 0.00;
        $total["track"] = array();
        $ss = DB::select("select distinct instructor_id as ins from courses");
        $inslist = json_decode(json_encode($ss), true);
        foreach ($inslist as $value) {
            $arr2 = [];
            $rtt = DB::select("select * from users where id =?", [$value['ins']]);
            $arr2['Name'] = $rtt[0]->name;
            $mm = DB::select("select * from courses where instructor_id =?", [$value['ins']]);
            $courcelist = json_decode(json_encode($mm), true);
            $count_course = sizeof($courcelist);
            $arr2["courcenum"] = $count_course;
            foreach ($courcelist as $vel) {
                $price = 0.00;
                $nn = DB::select("select sum(order_metas.amount) total from order_metas inner join orders on orders.id = order_metas.order_id where order_metas.course_id =? and orders.payment_status =? group by order_metas.course_id", [$vel['id'],"PAID"]);
                $orderlist = json_decode(json_encode($nn), true);
                $numberpurchase = sizeof($orderlist);
                if ($numberpurchase == 0) {
                    $price = 0.00;
                } else {
                    $price = $orderlist[0]['total'];
                }

                $totalinc = $totalinc + $price;
            }
            $arr2["incometotal"] = $totalinc;
            array_push($total["track"], $arr2);
        }
        //dd($total);
        return view('admin.instructors', ["briefearning" => $total]);
    }

    public function get_all_instructor(){
        $ss = DB::select("select users.name,instructorregistration.* from instructorregistration inner join users on instructorregistration.user_id = users.id where instructorregistration.status = 1");
        $courcelist = json_decode(json_encode($ss), true);

        return view('admin.verifyinstructor', ["instructors" => $courcelist]);   
    }

    public function get_CourceBy_student($id)
    {
        $ss = DB::select("select courses.*,users.name from enrolls inner join courses on courses.id = enrolls.course_id inner join users on users.id = enrolls.student_id where enrolls.student_id = ?", [$id]);
        $courcelist = json_decode(json_encode($ss), true);

        return view('admin.students', ["studentcource" => $courcelist]);
    }

    public function payment_withdrawl()
    {
        
        $records = DB::table("withdrawals")
            ->join("users", "withdrawals.withdrawal_by", '=', "users.id")
            ->select("users.id as instructor.id", "users.name as user_name", "withdrawals.*")
            ->latest("withdrawals.created_at")
            ->get();
        
        return view("admin.payment_approve", ["records" => $records]);
    }

    public function refunding($tran_id)
    {
        $ss = DB::select("select * from withdrawals where id in (select ref_id from transactions where id = ?)", [$tran_id]); 
        $refn = new Refund();
        $tran = new Transaction();
        $refn->tran_id = $tran_id;
        $refn->stat = 1;
        $refn->amount = $ss[0]->amount;
        $refn->save();

        $tran->type = "REFUND";
        $tran->ref_id = $refn->id;
        $tran->save();
        DB::update('UPDATE withdrawals SET withdrawal_status = "FAILD" WHERE id = ?', [
            $ss[0]->id,
           
        ]);
        return redirect()->route('helps.index');


    }
}
