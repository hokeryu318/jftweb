<?php

namespace App\Http\Controllers;

use Hash;

use Illuminate\Http\Request;

use App\Model\Role;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $name = $request->role;
        $password = $request->password;
        if($request->role = "reception"){
            $user = Role::where('name', '=', $name)->first();
            if(!isset($user)){
                return redirect(route('loginform'));
            }
            if(Hash::check($password, $user->password)){
                session(['role' => $name]);
                return redirect(route('admin.home'));
            } else {
                return redirect(route('loginform'));
            }
        }
    }

    public function adminLogin()
    {
        $route = session('redirectRoute');
        $slag = explode(".", $route)[1];
        return view('admin.login')->with(compact('slag'));
    }

    public function adminPostLogin(Request $request)
    {
        $name = 'admin';
        $password = $request->password;
        $user = Role::where('name', '=', $name)->first();
        $route = session('redirectRoute');
        if(!isset($user)){
            return redirect(route('loginform'));
        }
        if(Hash::check($password, $user->password)){
            session(['role' => $name]);
            return redirect(route($route));
        } else {
            return redirect(route('admin.check'));
        }
    }
}
