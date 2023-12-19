<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PHPUnit\Framework\Constraint\Count;
use Psy\Readline\Transient;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $menus = $this->get_menus();
        $course = Course::find($request->course_id);

        $courses = [];
        $courses[] = $course;

        $course_ids = [];
        foreach($courses as $course) {
            $course_ids[] =  $course->id;
        }

        $ids = implode(",", $course_ids);
        return view("frontend.checkout", ["ids" => $ids, "courses" => $courses, "total" => $course->sale_price, "menus" => $menus]);
    }

    public function cart_checkout(Request $request) 
    {
        $menus = $this->get_menus();
        $carts = Cart::where("student_id", auth()->user()->id)->get();
        $courses = [];
        $total = 0;

        foreach ($carts as $item) {
            $course = Course::find($item['course_id']);
            $total += $course->sale_price;
            $courses[] = Course::find($item['course_id']);
        }

        $course_ids = [];
        foreach ($courses as $course) {
            $course_ids[] =  $course->id;
        }

        $ids = implode(",", $course_ids);

        return view("frontend.checkout", ["ids" => $ids, "courses" => $courses, "total" => $total, "menus" => $menus]);
    }

    public function payment(Request $request)
    {
        $menus = $this->get_menus();
        $ids = explode(",", $request->course_id);
        $total = 0;

        foreach($ids as $id)
        {
            $course = Course::find($id);
            $total = $total + $course->sale_price;
        }

        $course = Course::find($request->course_id);
        $inputs = $request->all();

        $order = new Order();
        $order->purchase_by  = auth()->user()->id;
        $order->save();

        foreach($ids as $id) {
            $ordermeta = new OrderMeta();
            
            $course = Course::find($id);
            $ordermeta->order_id = $order->id;
            $ordermeta->course_id = $id;
            $ordermeta->amount = $course->sale_price;

            $ordermeta->save();
        }

        Cart::where("student_id", auth()->user()->id)->delete();

        return view("frontend.payment", ["inputs" => $inputs, "course" => $course, "total" => $total, "order" =>$order, "menus" => $menus]);
    }

    public function enroll(Request $request)
    {
        $menus = $this->get_menus();

        $enroll = new Enroll();
        $enroll->course_id = $request->course_id;
        $enroll->student_id = auth()->user()->id;

        if ($enroll->save()) {
            return redirect()->route("study.learn", $request->course_id);
        } 
        else {
        
        }
    }

    public function payment_success(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->order_id = $request->paypal_order_id;
        $order->payment_id = $request->paypal_payment_id;
        $order->payment_status = "PAID";

        $total = 0;
        $data = OrderMeta::where("order_id", $request->order_id)->get();
        
        foreach($data as $item)
        {
            $course = Course::find($item->course_id);
            $total = $total + $course->sale_price;

            $enroll = new Enroll();
            $enroll->course_id = $course->id;
            $enroll->student_id = auth()->user()->id;
            $enroll->order_id = $order->id;
            $enroll->save();
        }

        $order->amount = $total;
        $order->save();

        $transaction = new Transaction();
        $transaction->type = "EARNING";
        $transaction->ref_id = $order->id;
        $transaction->save();

        return response()->json(["status" => true], 200);
    }

    public function payment_cancel(Request $request)
    {
        return response()->json(["status" => false], 200);
    }

    public function generate_invoice(Request $request) 
    {
        
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
