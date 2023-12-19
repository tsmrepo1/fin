<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
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
        
        return view('auth.login', ["menus" => $menu]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $carts = $request->session()->get("carts");
        
        if(is_null($carts) == false) {
            foreach ($carts as $c) {
                $cart = new Cart();
                $cart->student_id = auth()->user()->id;
                $cart->course_id = $c['course_id'];
                $cart->save();
            }
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
