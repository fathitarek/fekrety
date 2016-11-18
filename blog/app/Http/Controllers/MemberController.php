<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Auth;
use Response;
use Session;
use Validator;
use DB;
use Illuminate\Http\Request;
use App\Member;
use App\Http\Requests;

class MemberController extends Controller {
  public function create() {

         return view('login');
     }

     public function reg() {

            return view('reg');
        }
    public function store(Request $request) {
// name fname mobile occupation email password
        $validator = Validator::make($request->all(), [

                    'name' => 'required|max:20|min:3',
                    'email' => 'required|min:2|unique:members',
                    'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/reg') ->withInput()->withErrors($validator);
        } else {
            $member = new Member;
            $member->name = $request['name'];
            $member->email = $request['email'];
            $member->password = md5($request['password']);
            $member->save();
            Session::flash('flash_message', 'thanks , You Registered Now');

		  return redirect('/');
        }
    }

    public function show() {
        $members = DB::table('members')->orderBy('member_id', 'desc')->paginate(50);

        return view('member.show', ['members' => $members]);
    }

    public function showOne($member_id) {
        $members = Member::find($member_id);
        return view('member.showOne', ['members' => $members]);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [

                    'email' => 'required|min:2',
                    'password' => 'required',
        ]);
        if ($validator->fails()) {
           return redirect('/')->withInput()->withErrors($validator);
		  // print_r($validator);
		  // return 'zezoooo';
        } else {
            $member = new Member;
            $member->email = $request['email'];
            $member->password = md5($request['password']);


            $members = \DB::select('select * from members where email=' . "'$member->email'" . 'and password =' . "'$member->password'");
print_r($members);
           // Session::put('member_id', $members[0]->member_id);
           // Session::put('name', $members[0]->name); // a string
//$member_id=  Session::get('member_id');
            if ($members) {
				        Session::put('member_id', $members[0]->member_id);
            Session::put('name', $members[0]->name);
                Session::flash('flash_message', 'thanks , You login Now');
                return redirect('/posts');
              }
//
//$member_id=  Session::get('member_id')
		else {
        Session::flash('warining', 'your email or password is wrong');
return redirect('/');

                   }

    }
	}

    public function logout() {
        Session::flush();
        Session::forget('member_id');
        Session::forget('name');
        if (Session::flush()) {
            echo'flushing';
        } else {
            echo 'no';
        }
        return redirect('/');
        //return 'logout';
    }

}
