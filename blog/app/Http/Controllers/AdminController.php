<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Auth;
use Response;
use Session;
use Validator;
use DB;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests;

class AdminController extends Controller {
  public function create() {

         return view('admin');
     }
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [

                    'email' => 'required|min:2',
                    'password' => 'required',
        ]);
        if ($validator->fails()) {
           return redirect('/admin')->withInput()->withErrors($validator);
		  // print_r($validator);
		  // return 'zezoooo';
        } else {
            $admin = new Admin;
            $admin->email = $request['email'];
            $admin->password = md5($request['password']);


            $admins = \DB::select('select * from admin where email=' . "'$admin->email'" . 'and password =' . "'$admin->password'");
           // Session::put('member_id', $members[0]->member_id);
           // Session::put('name', $members[0]->name); // a string
//$member_id=  Session::get('member_id');
            if ($admins) {
				        Session::put('id', $admins[0]->id);
                Session::put('admin', $admins[0]->name);
                Session::flash('flash_message', 'thanks , You login Now');
                return redirect('/list');
              }
//
//$member_id=  Session::get('member_id')
		else {
        Session::flash('warining', 'your email or password is wrong');
return redirect('/admin');

                   }

    }
	}

    public function logout() {
        Session::flush();
        Session::forget('id');
        Session::forget('admin');
        if (Session::flush()) {
            echo'flushing';
        } else {
            echo 'no';
        }
        return redirect('/admin');
        //return 'logout';
    }

}
