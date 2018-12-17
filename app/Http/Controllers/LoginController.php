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
        $name = $request->name;
        $password = $request->password;
        if($request->name = "admin"){
            $user = Role::where('name', '=', $name)->first();
            if(!isset($user)){
                return redirect(route('loginform'));
            }
            if(Hash::check($password, $user->password)){
                session(['role' => $name, 'logged' => true]);
                return 'success';
            } else {
                return redirect(route('loginform'));
            }
        }
    }
}
