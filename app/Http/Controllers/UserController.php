<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\Post;
use App\Models\User;
use App\Models\Room;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



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
        $current_user = Auth::id();
        $user = Auth::user();
        $post = Post::where('user_id', '=', $current_user)->get();
        $message = Message::where('user_id', '=', $current_user)->get();
        $room = Room::where('applicant_id', '=', $current_user)
                    ->orWhere('poster_id', '=', $current_user)
                    ->get();
        $user->delete();
        $post->each->delete();
        $message->each->delete();
        $room->each->delete();
        \Session::flash('flash_message', '退会しました。');
        return redirect('/');
    }
}