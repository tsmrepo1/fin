<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
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

        return view('auth.register', ["menus" => $menu]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $carts = $request->session()->get("carts");
        if (is_null($carts) == false) {
            foreach ($carts as $c) {
                $cart = new Cart();
                $cart->student_id = auth()->user()->id;
                $cart->course_id = $c['course_id'];
                $cart->save();
            }
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
