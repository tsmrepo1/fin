<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = DB::table('categories')->select('*')->where('parent_id', 0)->get();

        $parentcat =  json_decode(json_encode($result), true);
        return view('admin.cms.viewcat',['parenting' => $parentcat]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = DB::table('categories')->select('id', 'name')->where('parent_id', 0)->get();

        $parentcat =  json_decode(json_encode($result), true);
        return view('admin.cms.category',['parenting' => $parentcat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('imageInput')->isValid()) {
            $imageName = $request->file('imageInput')->store('categories', 'public');
        }
        
        $category = new Category();
        if($request->category==""){
            $category->parent_id = 0;
            $category->name = $request->title;
            $category->description = $request->content;
            $category->image =$imageName;
        }else{
            $category->parent_id = $request->category;
            $category->name = $request->title;
            $category->description = $request->content;
            $category->image =$imageName;   
        }
        $category->save();

    
        return view("admin.cms.create"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }

    public function get_subcategories(Request $request)
    {
        $categories = Category::where("parent_id", $request->category_id)->get();

        return response(["categories" => $categories], 200);
    }
}
