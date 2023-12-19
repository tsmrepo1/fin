<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannermanagementController extends Controller
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
        $result = DB::table('banner')->select('*')->get();

        $parentcat =  json_decode(json_encode($result), true);
        return view('admin.cms.banner', ['alldata' => $parentcat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title[] = $request->input('title');
        $imagess[] = $request->file('imageInput');
        $linkss[] = $request->link;
        for ($i = 0; $i < sizeof($title[0]); $i++) {
            if ($imagess[0][$i]->isValid()) {
                $imageName = $imagess[0][$i]->store('banner', 'public');
                DB::table('banner')->insert([
                    'banner_title' => $title[0][$i],
                    'banner_img' => $imageName,
                    'banner_link' => $linkss[0][$i],
                ]);
            }
        }
        return view("admin.cms.create");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = DB::table('banner')->where('id',$id)->select('*')->get();

        return view('admin.cms.banner-edit', ['alldata' => $result]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        if ($request->hasFile('imageInput')) {
            if ($request->file('imageInput')->isValid()) {
                $imageName = $request->file('imageInput')->store('banner', 'public');
            }
            DB::table('banner')
            ->where('id', '=', $id)
            ->update([
                'banner_title' => $request->title,
                'banner_img' =>$imageName ,
                'banner_link'=>$request->link
            ]);
        }else{
            DB::table('banner')
            ->where('id', '=', $id)
            ->update([
                'banner_title' => $request->title,
                'banner_link'=>$request->link
            ]); 
        }
       
        return redirect()->route("banners.create");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('banner')
            ->where('id', '=', $id)
            ->delete();

        return redirect()->route("banners.create");
    }
}
