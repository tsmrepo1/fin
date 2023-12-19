<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Forumhead;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Models\Forummessage;
use App\Models\Lesson;
use App\Models\Order;
use App\Models\Withdraw;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    public function dashboard()
    {
        $courses = Course::where("instructor_id", auth()->user()->id)->get();

        return view("instructor.dashboard", ["courses" => $courses]);
    }

    public function earning(Request $request)
    {
        return view("instructor.earning");
    }

    public function transaction(){
        $total["History"] = array();
        $tran = Transaction::orderBy('id', 'desc')->get()->toArray();
        foreach($tran as $value){
            
            $arr2 = [];
            $stat = $value['type'];
            
            if($stat=="EARNING"){
                $ss = DB::select("select * from order_metas inner join transactions on order_metas.order_id = transactions.ref_id inner join courses on order_metas.course_id = courses.id inner join orders on orders.id = order_metas.order_id inner join users on orders.purchase_by = users.id where courses.instructor_id = ? and transactions.ref_id = ?", [auth()->user()->id, $value['ref_id']]);
                 $resultsArray = json_decode(json_encode($ss), true);
                
                 if(sizeof($resultsArray)>0){
                    foreach($resultsArray as $vell){
                        $arr2["Date"]  = date("d-m-Y", strtotime($vell['created_at']));
                        $arr2["Type"] = "Purchased";
                        $arr2["Amount"] = $vell['sale_price'];
                        $arr2["Name"] = $vell["title"];
                        $arr2["Desc"] = $vell["name"].", has purchased the cource: ".$vell["title"].", with order ID : ".$vell["order_id"];
                        $arr2["referrer"] = $vell["order_id"];
                        $arr2["status"] = $vell["payment_status"];
                        array_push($total["History"],$arr2);
                    }
                   
                 }
                 
            }elseif($stat=="WITHDRAWL"){
                $ss = DB::select("SELECT * FROM transactions AS t1 INNER JOIN withdrawals AS t2 ON t1.ref_id = t2.id INNER JOIN users AS t3 ON t2.withdrawal_by = t3.id WHERE t3.id = ? and t1.type = 'WITHDRAWL' and t1.ref_id = ?", [auth()->user()->id,$value['ref_id']]);
                $resultsArray = json_decode(json_encode($ss), true);  
                if(sizeof($resultsArray)===1){
                    $arr2["Date"]  = date("d-m-Y", strtotime($value['created_at']));
                    $arr2["Type"] = "Withdrawn";
                    $arr2["Amount"] = $resultsArray[0]['amount'];
                    $arr2["Name"] = "NA";
                    $arr2["Desc"] = "You have requested for withdraw the amount : ".$resultsArray[0]['amount'];
                    $arr2["referrer"] = $resultsArray[0]["reference"];
                    $arr2["status"] = $resultsArray[0]["withdrawal_status"];
                    array_push($total["History"],$arr2);
                }

            }elseif($stat=="REFUND"){
                $ss = DB::select("select b.created_at,a.type,b.amount from transactions a inner join refund b on a.ref_id = b.id inner join transactions c on b.tran_id = c.id inner join withdrawals d on c.ref_id = d.id inner join users e on d.withdrawal_by = e.id where a.type = 'REFUND' and d.withdrawal_by = ? and a.ref_id = ?", [auth()->user()->id,$value['ref_id']]);
                $resultsArray = json_decode(json_encode($ss), true);  
                if(sizeof($resultsArray)===1){
                    $arr2["Date"]  = date("d-m-Y", strtotime($value['created_at']));
                    $arr2["Type"] = "REFUND";
                    $arr2["Amount"] = $resultsArray[0]['amount'];
                    $arr2["Name"] = "NA";
                    $arr2["Desc"] = "Admin Has Refunded the amount : ".$resultsArray[0]['amount'];
                    $arr2["referrer"] = "";
                    $arr2["status"] = "";
                    array_push($total["History"],$arr2);
                }
            }
            
        }

        
        
        $totalinc = 0.00;
         $mm = DB::select("select * from courses where instructor_id =?", [auth()->user()->id]);
            $courcelist = json_decode(json_encode($mm), true);
            foreach($courcelist as $vel){
                $price = 0.00;
                $nn = DB::select("select sum(order_metas.amount) total from order_metas inner join orders on orders.id = order_metas.order_id where order_metas.course_id =? and orders.payment_status =? group by order_metas.course_id", [$vel['id'], "PAID"]);
                $orderlist = json_decode(json_encode($nn), true); 
                $numberpurchase = sizeof($orderlist);
                if($numberpurchase==0){
                    $price = 0.00; 
                }else{
                    $price = $orderlist[0]['total'];
                    
                }
                  
                $totalinc = $totalinc+$price;
            }
            $withdr = DB::select("select sum(amount) total from withdrawals where withdrawal_by =? and withdrawal_status IN ('PENDING','APPROVED')", [auth()->user()->id]);
            $withdrawing = json_decode(json_encode($withdr), true); 
            $takeoff = $withdrawing[0]['total'];
            $newbalance = $totalinc - $takeoff;
              
         // dd($total);
        
        return view("instructor.earning",["histories" => $total,"Balance"=>$newbalance]);

    }

    public function paymentmethodadd(Request $request){
       if($request->apf_type=="bank account"){
          $data = [
            "Benificiary_Name" => $request->apf_ben_name,
            "Bank_Name" => $request->apf_bank_name,
            "Bank_Account" => $request->apf_account_no,
            "Ifsc_Code" => $request->apf_ifsc_code,
            
        ];
        
        $totalbank = json_encode($data);

       $paymode = new PaymentMethod();
       $paymode->instructor_id = auth()->user()->id;
       $paymode->type = "Bank";
       $paymode->details = $totalbank;

       $paymode->save();

       }else{
        $data = [
            "Paypal_Url" =>$request->apf_paypal_url,
            
        ];
        
        $payurl = json_encode($data);

       $paymode = new PaymentMethod();
       $paymode->instructor_id = auth()->user()->id;
       $paymode->type = "PAYPAL";
       $paymode->details = $payurl;

       $paymode->save();
       }
       $total["History"] = array();
        $tran = Transaction::orderBy('id', 'desc')->get()->toArray();
        foreach($tran as $value){
            $arr2 = [];
            $stat = $value['type'];
            if($stat=="EARNING"){
                $ss = DB::select("select * from order_metas inner join transactions on order_metas.order_id = transactions.ref_id inner join courses on order_metas.course_id = courses.id inner join orders on orders.id = order_metas.order_id inner join users on orders.purchase_by = users.id where courses.instructor_id = ? and transactions.ref_id = ?", [auth()->user()->id, $value['ref_id']]);
                 $resultsArray = json_decode(json_encode($ss), true);
                
                 if(sizeof($resultsArray)>0){
                    foreach($resultsArray as $vell){
                        $arr2["Date"]  = date("d-m-Y", strtotime($vell['created_at']));
                        $arr2["Type"] = "Purchased";
                        $arr2["Amount"] = $vell['sale_price'];
                        $arr2["Name"] = $vell["title"];
                        $arr2["Desc"] = $vell["name"].", has purchased the cource: ".$vell["title"].", with order ID : ".$vell["order_id"];
                        $arr2["referrer"] = $vell["order_id"];
                        $arr2["status"] = $vell["payment_status"];
                        array_push($total["History"],$arr2);
                    }
                   
                 }
                 
            }else{
                $ss = DB::select("SELECT * FROM transactions AS t1 INNER JOIN withdrawals AS t2 ON t1.ref_id = t2.id INNER JOIN users AS t3 ON t2.withdrawal_by = t3.id WHERE t3.id = ? and t1.ref_id = ?", [auth()->user()->id,$value['ref_id']]);
                $resultsArray = json_decode(json_encode($ss), true);  
                if(sizeof($resultsArray)===1){
                    $arr2["Date"]  = date("d-m-Y", strtotime($value['created_at']));
                    $arr2["Type"] = "Withdrawn";
                    $arr2["Amount"] = $resultsArray[0]['amount'];
                    $arr2["Name"] = "NA";
                    $arr2["Desc"] = "You have requested for withdraw the amount : ".$resultsArray[0]['amount'];
                    $arr2["referrer"] = $resultsArray[0]["reference"];
                    $arr2["status"] = $resultsArray[0]["withdrawal_status"];
                    array_push($total["History"],$arr2);
                }

            }
            
        }
       return view("instructor.earning",["histories" => $total,"Message"=>"Payment Method Added Successfully."]);
    }

    public function withdraw(Request $request){
        $totalinc = 0.00;
        $mm = DB::select("select * from courses where instructor_id =?", [auth()->user()->id]);
           $courcelist = json_decode(json_encode($mm), true);
           foreach($courcelist as $vel){
               $price = 0.00;
               $nn = DB::select("select sum(order_metas.amount) total from order_metas inner join orders on orders.id = order_metas.order_id where order_metas.course_id =? and orders.payment_status =? group by order_metas.course_id", [$vel['id'], "PAID"]);
               $orderlist = json_decode(json_encode($nn), true); 
               $numberpurchase = sizeof($orderlist);
               if($numberpurchase==0){
                   $price = 0.00; 
               }else{
                   $price = $orderlist[0]['total'];
                   
               }
                 
               $totalinc = $totalinc+$price;
           }
           $withdr = DB::select("select sum(amount) total from withdrawals where withdrawal_by =? and withdrawal_status IN ('PENDING','APPROVED')", [auth()->user()->id]);
            $withdrawing = json_decode(json_encode($withdr), true); 
            $takeoff = $withdrawing[0]['total'];
            $newbalance = $totalinc - $takeoff;

            if($newbalance>=$request->rf_amount){
                $withd = new Withdraw();
                $withd->withdrawal_by = auth()->user()->id;
                $withd->amount = $request->rf_amount;
         
                $withd->save();
                $last = $withd->id;
         
                $tran = new Transaction();
                $tran->type = "WITHDRAWL";
                $tran->ref_id = $last;
         
                $tran->save();
                return redirect()->route("instructor.transaction");
            }else{
                return redirect()->route("instructor.transaction");
            }
       
       
       

    }

    public function getallwithdrawl(){

        $withdr = DB::select("select transactions.id,withdrawals.amount,withdrawals.reference from transactions inner join withdrawals on transactions.ref_id = withdrawals.id where withdrawals.withdrawal_by =? and transactions.type = 'WITHDRAWL'", [auth()->user()->id]);
            $options = json_decode(json_encode($withdr), true); 
        return response()->json($options);
    }
    
    public function fetchforum(){
        $question = DB::select("select forums.id,courses.title course,chapters.title chapter,lessons.title lesson,forummessages.message,usu.name,forums.created_at from forums inner join courses on forums.course_id = courses.id inner join chapters on forums.chapter_id = chapters.id inner join lessons on forums.lesson_id = lessons.id inner join users on courses.instructor_id = users.id inner join users usu on forums.created_by = usu.id inner join forummessages on forums.id = forummessages.forum_id where users.id =? and forummessages.stat = 1", [auth()->user()->id]);
        $Qs = json_decode(json_encode($question), true); 

        return view("instructor.forumdetails",["questions" => $Qs]);

    }

  
    public function allhead($tran_id){
        $details = DB::select("select forummessages.forum_id,users.name sender,usu.name receiver,forummessages.message,forummessages.created_at from forums inner join forummessages on forums.id = forummessages.forum_id inner join users on forummessages.fr_id = users.id inner join users usu on forummessages.to_id = usu.id where forums.id =? order by forummessages.id", [$tran_id]);
        $dt = json_decode(json_encode($details), true); 

        return view("instructor.detailsforum",["heads" => $dt]);

    }

    public function replying(Request $rst){
        $ed = DB::select("select * from forums where id=?", [$rst->idd]);
        $ids = json_decode(json_encode($ed), true); 

      $send = new Forummessage();
      $send->forum_id = $rst->idd;
      $send->fr_id = auth()->user()->id;
      $send->to_id =$ids[0]['created_by'];
      $send->stat = 0;
      $send->message = $rst->message;

      $send->save();

      return redirect()->route('forum.details',$rst->idd); 
    }

    public function ask_question(Request $request)
    {
        $chapter = Chapter::find($request->lesson_id);
        $course = Course::find($chapter->course_id);

        $question = new Forumhead();
        $message = new Forummessage();

        $question->course_id    = $chapter->course_id;
        $question->chapter_id   = $chapter->id;
        $question->lesson_id    = $request->lesson_id;
        $question->created_by   = auth()->user()->id;

        if($question->save())
        {
            $message->forum_id  = $question->id;
            $message->fr_id     = auth()->user()->id;
            $message->to_id     = $course->instructor_id;
            $message->message   = $request->question;
        
            if($message->save())
            {
                return response()->json(["status" => true], 200);
            }
            else 
            {
                return response()->json(["status" => false], 500);
            }
        }
        else 
        {
            return response()->json(["status" => false], 500);
        }
    }
}
