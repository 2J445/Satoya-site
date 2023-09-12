<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index()
    {
        
    }
    public function show($id)
    {
        $user = User::find($id);
        $current_user = Auth::id();
        $posts = Post::where('user_id', '=', $current_user)->get();
        return view('users.show', ['user' => $user, 'current_user'=> $current_user, 'posts' => $posts]);
    }
    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $current_user = Auth::id();
        $posts = Post::where('user_id', '=', $current_user)->get();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->self_introduction = $request->self_introduction;
        $user->address = $request->address;
        $user->post_code = $request->post_code;
        $user->telephone_number = $request->telephone_number;
        $user->password = $request->password;
        $user->save();
        return view('users.show', ['user' => $user, 'current_user'=> $current_user, 'posts' => $posts])->with('ユーザー情報を更新しました');
    }
    public function destroy($id)
    {
        $user = Auth::user();
        $user->delete();
        \Session::flash('flash_message', '退会しました。');
      return redirect('/');
    }
}
