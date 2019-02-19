<?php

namespace App\Http\Controllers;

use Hash;

use Illuminate\Http\Request;

use App\Model\Role;
use App\Model\Table;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $name = $request->role;
        $password = $request->password;
        $user = Role::where('name', '=', $name)->first();
        if(!isset($user)){
            return redirect(route('loginform'));
        }
        if(Hash::check($password, $user->password)){
            session(['role' => $name]);
            if($request->role == "reception") {
                return redirect(route('reception.seated'));
            }
            if($request->role = "menu"){
                $table_name = $request->table;
                $table_name_arr = array('A'=>1, 'B'=>2, 'C'=>3);
                $table_type = $table_name_arr[strtoupper($table_name[0])];
                $table_index = $table_name[1];
                $table = Table::select('id')->where('type', $table_type)->where('index', $table_index)->get();
                if(count($table) > 0){
                    $order = $table[0]->order;
                    if(count($order) > 0){
                        $order_id = $order[0]->id;
                    }else{
                        $order_id = 0;
                    }
                    return redirect()->route('customer.index', ['order_id'=>$order_id]);
                }else{
                    return redirect(route('loginform'));
                }
            }
        } else {
            return redirect(route('loginform'));
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
