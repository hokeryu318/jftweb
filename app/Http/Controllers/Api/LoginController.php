<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

use App\Model\Role;
use App\Model\Table;
use App\Model\Receipt;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $ip = Receipt::find(1)->pluck('ip_address')->first();
        $ip = 'http://'.$ip;
        $ip = 'http://'.'192.168.192.100';

        $role = $request->role;
        $password = $request->password;

        $user = Role::where('name', '=', $role)->first();

        if(!isset($user)){
            $url = '';
            $message = 'There is no user.';
            return $this->sendResponse($url, $message);
        }

        if(Hash::check($password, $user->password)){
            session(['role' => $role]);
            if($request->role == "reception" || $request->role == "master") {
                $url = $ip.'/jftweb/public/reception/seated?status=seated';
                $message = 'reception success';
            }
            else if($request->role == "menu"){
                $table_name = $request->table;
                if($table_name) {
                    $table = Table::select('id')->where('name', $table_name)->get();
                    if(count($table) > 0){
                        $order = $table[0]->order;
                        if(count($order) > 0){
                            $order_id = $order[0]->id;
                            $table_id = $table[0]->id;
                            $url = $ip.'/jftweb/public/customer/index/'.$order_id.'?table_id='.$table_id;
                            $message = 'menu success';
                        }
                        else{
                            $url = '';
                            $message = "There is no order registered!";
                        }
                    }
                    else {
                        $url = '';
                        $message = "Please enter table name correctly!";
                    }
                }
                else {
                    $url = '';
                    $message = "Please enter table name!";
                }
            }
            else if($request->role == "kitchen") {
                $url = $ip.'/jftweb/public/kitchen/main_screen';
                $message = 'kitchen success';
            }

            return $this->sendResponse($url, $message);
        }
        else {
            $url = '';
            if($password)
                $message = "Please enter your password correctly!";
            else
                $message = "Please enter password!";
            return $this->sendResponse($url, $message);
        }

    }

    public function get_table() {

        //get ip address from database
        $profile = Receipt::profile();
        $ip_address = $profile->ip_address;
        //last get table number(ordered already)
        $table_last = Table::where('index', 0)->orderBy('id', 'desc')->first()->name;

        $response = [
            'ip_address' => $ip_address,
            'table_last' => $table_last
        ];

        return response()->json($response, 200);
    }

    public function sendResponse($result, $message)
    {
        $response = [
            'url'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

}
