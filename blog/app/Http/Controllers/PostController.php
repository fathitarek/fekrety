<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Auth;
use Response;
use Session;
use Validator;
use DB;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class PostController extends Controller {
  public function create() {
if (Session::has('name')) {
         return view('add');
       }else {
        return redirect('/');
       }
     }



    public function store(Request $request) {
// name fname mobile occupation email password
if (Session::has('name')) {
        $validator = Validator::make($request->all(), [

                    'post' => 'required|max:20|min:3',
                    'member_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/reg') ->withInput()->withErrors($validator);
        } else {
            $pst = new Post;
            $pst->post = $request['post'];
            $pst->member_id = $request['member_id'];

            $pst->save();
            Session::flash('flash_message', 'thanks , Your Post added Now');

		  return redirect('/posts');
        }
      }else {
       return redirect('/');
      }
    }

    public function show() {
      if (Session::has('name')) {
        $pst = DB::table('posts')->orderBy('post_id', 'desc')->paginate(2);

        return view('posts', ['pst' => $pst]);
      }else {
       return redirect('/');
      }
    }
    public function home() {
      if (Session::has('admin')) {
        $pst = DB::table('posts')->orderBy('post_id', 'desc')->paginate(5);

        return view('post/index', ['pst' => $pst]);
      }else {
       return redirect('/admin');
      }
    }
    public function showOne($post_id) {
      if (Session::has('admin')) {
        $pst = Post::find($post_id);
        return view('post/show', ['pst' => $pst]);
      }else {
       return redirect('/admin');
      }
    }

    public function edit($post_id) {
            if (Session::has('admin')) {
                $pst = Post::find($post_id);

                return view('post.edit')->with('pst', $pst);
              }else {
               return redirect('/admin');
              }
        }

        public function update(Request $request, $post_id) {
          if (Session::has('admin')) {
                $pst = Post::find($post_id);
                $pst->post = $request['post'];

                $pst->save();
                Session::flash('flash_message', 'post is update');
                return redirect('/list');
              }else {
               return redirect('/admin');
              }
        }
        public function destroy($post_id) {
                if (Session::has('admin')) {
$pst = Post::find($post_id);
                   $pst->delete();
                   Session::flash('flash_message', 'post is Delete');
                   return redirect('/list');
                 }else {
                  return redirect('/admin');
                 }
           }

}
