<?php

namespace App\Http\Controllers;

use App\Model\Receipt;
use Hash;

use Illuminate\Http\Request;
use App\Events\NotificationEvent;

use App\Model\Role;
use App\Model\Table;
use App\Model\Order;

class LoginController extends Controller
{
    //
    public function getLogin()
    {
        //get ip address from database
        $profile = Receipt::profile();
        //last get table number(ordered already)
        $table_last = Table::where('index', 0)->orderBy('id', 'desc')->first();
        return view('login')->with(compact('table_last', 'profile'));
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
            if($request->role == "reception" || $request->role == "master") {
                return redirect()->route('reception.seated', ['status' => 'seated']);
            }
            else if($request->role == "menu"){
                $table_name = $request->table;
                if($table_name) {
//                    $table_name = str_replace(' ', '', $table_name);
                    $table = Table::select('id')->where('name', $table_name)->get();//dd($table);
                    if(count($table) > 0){
                        $order = $table[0]->order;
                        if(count($order) > 0){
                            $order_id = $order[0]->id;
                            return redirect()->route('customer.index', ['order_id'=>$order_id, 'table_id'=>$table[0]->id]);
                        }
                        else{
                            $alert = "There is no order registered!";
                            return redirect(route('loginform'))->with(compact('alert'));
                        }
                    }
                    else {
                        $alert = "Please enter table name correctly!";
                        return redirect(route('loginform'))->with(compact('alert'));
                    }
                }
                else {
                    $alert = "Please enter table name!";
                    return redirect(route('loginform'))->with(compact('alert'));
                }
            }
            else if($request->role == "kitchen") {
                return redirect(route('kitchen.main_screen'));
            }
        } else {
            if($password)
                $alert = "Please enter your password correctly!";
            else
                $alert = "Please enter password!";
            return redirect(route('loginform'))->with(compact('alert'));
        }
    }

    public function adminLogin(Request $request)
    {
        $profile = Receipt::profile();
        $slag = $request->admin_status;//dd($slag);
        $alert = '';
        return view('admin.login')->with(compact('slag', 'alert', 'profile'));
    }

    public function adminPostLogin(Request $request)
    {
        $slag = $request->slag;
        $name = 'admin';
        $password = $request->password;
        $user = Role::where('name', $name)->first();
        $master = Role::where('name', 'master')->first();
        if(!isset($user) && !isset($master)){
            return redirect(route('loginform'));
        }
        if($password) {
            if(Hash::check($password, $user->password) || Hash::check($password, $master->password)){
                switch($slag)
                {
                    case 'edit_menu':
                        $route = 'admin.dish';
                        break;
                    case 'saledata':
                        $route = 'admin.saledata';
                        break;
                    case 'setting':
                        $route = 'admin.setting.receipt';
                        break;
                    case 'table':
                        $route = 'admin.table';
                        break;
                }
                return redirect(route($route));
            }
            else {
                $alert = "Please enter your password correctly!";
                return view('admin.login')->with(compact('slag', 'alert'));
            }
        }
        else {
            $alert = "Please enter password!";
            return view('admin.login')->with(compact('slag', 'alert'));
        }

    }

    public function change_ip(Request $request)
    {
        $changed_ip = $request->changed_ip;
        Receipt::where('id', 1)->update(['ip_address' => $changed_ip]);
    }
}
