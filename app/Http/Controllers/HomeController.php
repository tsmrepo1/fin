<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\CourseMeta;
use App\Models\Enroll;
use App\Models\Lesson;
use App\Models\InstructordetailsModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $ban = DB::select("select * from banner");
        $banners = json_decode(json_encode($ban), true);  

        $menus = $this->get_menus();

        $records = [];
        $categories = Category::all();
        foreach($categories as $category)
        {
            $category->courses = DB::table('course_metas')
                                    ->join("courses", "course_metas.course_id", "=", "courses.id") 
                                    ->where("courses.category_id", $category->id)->get();

            if(count($category->courses) > 0) 
            {
                $records[] = $category;
            }
        }           

        return view('frontend.index', ["records" => $records, "menus" => $menus, "banners" => $banners]);
    }

    public function single_course(Request $request) 
    {
        $menus = $this->get_menus();

        $course = Course::find($request->id);
        $course->course_meta = CourseMeta::where("course_id", $request->id)->first();
        $chapters = [];

        $course_chapters = Chapter::where("course_id", $course->id)->get();
        foreach($course_chapters as $chapter) 
        {
            $chapter->lessons = Lesson::where("chapter_id", $chapter->id)->get();
            $chapters[] = $chapter;
        }

        $course->chapters = $chapters;

        return view('frontend.single_course', ["course" => $course, "menus" => $menus]);
    }

    public function learning(Request $request)
    {
        $menus = $this->get_menus();

        $courses = [];
        $my_courses= Enroll::where("student_id", auth()->user()->id)->get();
        foreach($my_courses as $my_course) {
            $courses[] = Course::find($my_course->course_id);
        }

        return view("frontend.my_learning", ["courses" => $courses, "menus" => $menus]);
    }

    public function get_menus()
    {
        $menu['category'] = array();
         $all = Category::where('parent_id',0)->get()->toArray();
         foreach($all as $value){
            $arr1['subcat'] = array();
           $arr1["id"] = $value['id'];
           $arr1["title"] = $value['name'];
           $arr1["desc"] = $value['description'];
           $arr1["iamge"] = $value['image'];
           $bll = Category::where('parent_id',$value['id'])->get()->toArray();
           foreach($bll as $vell){
            $arr2 = [];
             $arr2["sub_id"] = $vell['id'];
             $arr2["sub_title"] = $vell['name'];
             $arr2["sub_desc"]= $vell['description'];
             $arr2["sub_image"] = $vell["image"];
             array_push($arr1['subcat'], $arr2);
           }
           array_push($menu['category'], $arr1);
         }
        return $menu;
    }

    public function instructorship(){
        $menus = $this->get_menus();
        return view('frontend.instructor', ["menus" => $menus]);   
    }

    public function reginstructor(){
        $menus = $this->get_menus();
        

        return view('frontend.instructormform', ["menus" => $menus]);   
    }

    public function submitregis(Request $rst){
        $menus = $this->get_menus();
        if ($rst->hasFile('file_upload')) {
            $pdfFile = $rst->file('file_upload');
            $destinationPath = public_path('/instructorcertificate'); // Change the path as needed
            $fileName = $pdfFile->getClientOriginalName();
            $pdfFile->move($destinationPath, $fileName);

            $instructor = new InstructordetailsModel();
            $instructor->user_id = auth()->user()->id;
            $instructor->desig = $rst->designation;
            $instructor->working = $rst->current_working;
            $instructor->last_qualified = $rst->last_qualification;
            $instructor->spec = $rst->specialization;
            $instructor->exp = $rst->teaching_experience;
            $instructor->certificate = $fileName;
            $instructor->save();
            $courses = Course::where("instructor_id", auth()->user()->id)->get();

            return view("instructor.dashboard", ["courses" => $courses]);
            
        }
    }

    public function add_cart(Request $request)
    {
        if(Auth::check())
        {
            $is_exist = Cart::where(["student_id" => auth()->user()->id, "course_id" => $request->course_id])->first();

            if($is_exist) {
                return response()->json(["status" => false, "message" => "Course is already added to the cart"], 400);
            }

            $cart = new Cart();
            $cart->student_id = auth()->user()->id;
            $cart->course_id = $request->course_id;


            if($cart->save())
            {
                return response()->json(["status" => false, "message" => "Course is added to the cart"], 400);
            }
            else
            {
                return response()->json(["status" => false, "message" => "Something went wrong"], 400);
            }
        }
        else
        {
            if($request->session()->exists('carts') == false)
            {
                $request->session()->put('carts', []);
            }
            else
            {
                $carts = $request->session()->get("carts");
                foreach($carts as $cart) {
                    if($cart['course_id'] == $request->course_id) {
                        return response()->json(["status" => false, "message" => "Course is already added to the cart"], 400);
                    }
                }

                $carts[] = [
                    "student_id" => "",
                    "course_id" => $request->course_id,
                ];

                $request->session()->put('carts', $carts);

                return response()->json(["status" => true, "message" => "Course is added to the cart"], 200);
            }
        }
    }

    public function add_wishlist(Request $request)
    {
        if (Auth::check()) {
            $is_exist = Cart::where(["student_id" => auth()->user()->id, "course_id" => $request->course_id])->first();

            if ($is_exist) {
                return response()->json(["status" => false, "message" => "Course is already added to the cart"], 400);
            }

            $cart = new Cart();
            $cart->student_id = auth()->user()->id;
            $cart->course_id = $request->course_id;


            if ($cart->save()) {
                return response()->json(["status" => false, "message" => "Course is added to the cart"], 400);
            } else {
                return response()->json(["status" => false, "message" => "Something went wrong"], 400);
            }
        } else {
            if ($request->session()->exists('carts') == false) {
                $request->session()->put('carts', []);
            } else {
                $carts = $request->session()->get("carts");
                foreach ($carts as $cart) {
                    if ($cart['course_id'] == $request->course_id) {
                        return response()->json(["status" => false, "message" => "Course is already added to the cart"], 400);
                    }
                }

                $carts[] = [
                    "student_id" => "",
                    "course_id" => $request->course_id,
                ];

                $request->session()->put('carts', $carts);

                return response()->json(["status" => true, "message" => "Course is added to the cart"], 200);
            }
        }
    }

    public function tc()
    {
       $tc = $this->main_query();
       // dd($tc);
       $terms = $tc[0]->termsncond;
      

        $menus = $this->get_menus();

        return view("frontend.tc", ["menus" => $menus, "data" => $terms]);

    }

    public function pp()
    {
        $tc = $this->main_query();
        $privacy = $tc[0]->privacy;

        $menus = $this->get_menus();

        return view("frontend.pp", ["menus" => $menus, "data" =>  $privacy]);
    }

    public function main_query(){
        $ss = DB::select("select * from cms");
        
        return $ss;
    }

    public function cart(Request $request)
    {
        $menus      = $this->get_menus();
        $records    = [];
        $carts      = [];
        
        if (Auth::check()) 
        {
            $carts = Cart::where("student_id", auth()->user()->id)->get();
        }
        else 
        {
            if ($request->session()->exists('carts')) 
            {
                $carts = $request->session()->get("carts");
            } 
        }

        $total = 0;
        
        foreach($carts as $item)
        {
            $course = Course::find($item['course_id']);
            $total+=$course->sale_price;
            $records[] = Course::find($item['course_id']);
        }

        return view("frontend.cart", ["records" => $records, "total" => $total, "menus" => $menus]);
    }
}
