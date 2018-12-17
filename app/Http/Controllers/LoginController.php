<?php

namespace App\Http\Controllers;

use Hash;

use Illuminate\Http\Request;

use App\Role;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $name = $request->role;
        $password = $request->password;
        if($request->role = "admin"){
            $user = Role::where('name', '=', $name)->first();
            if(!isset($user)){
                return redirect(route('loginform'));
            }
            if(Hash::check($password, $user->password)){
                session(['role' => $name, 'logged' => true]);
                return redirect(route('admin.home'));
            } else {
                return redirect(route('loginform'));
            }
        }
    }
}
