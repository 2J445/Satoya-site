<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      // データベース内のすべてのpostを取得し、post変数に代入
      $posts = Post::all();
      // 'posts'フォルダ内の'index'viewファイルを返す。
      // その際にview内で使用する変数を代入します。
      return view('posts/index', ['posts' => $posts, 'user'=> $user]);
    }
    
    public function show($id)
    {
      $user = Auth::user();
      $post = Post::find($id); // idでPostを探し出す
      // 現在認証しているユーザーを取得
      $current_user = auth()->user();
      return view('posts.show', ['post' => $post, 'current_user'=> $current_user, 'user'=> $user]);
    }
    
    public function create () 
    {
      $user = Auth::user();
        return view('posts/create', ['user'=> $user]);
    }
    
    public function new()
    {
        return view('post/new');

    }
    
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      \Session::flash('flash_message', '削除しました。');
      return redirect('/');
    }
    
    public function store(Request $request)
    {
      //ユーザーIDを取得
      $user_id = Auth::id();
      $post = new Post;
      // フォームから送られてきたデータをそれぞれ代入
      $post->user_id = $user_id;
      $post->name = $request->name;
      $post->breed = $request->breed;
      
      //画像投稿の記述
      $post->image = $request->image->store('images');
      
      $post->age = $request->age;
      $post->gender = $request->gender;
      $post->explanation = $request->explanation;
      // データベースに保存
      $post->save();
      return redirect('/')->with('flash_message', '投稿が完了しました');
    }
    
    public function is_finished(Request $request, $id)
    {
      $post = Post::find($id);
      $post->is_finished = '1';
      $post->save();
      return redirect('/')->with('flash_message', '成立しました。１か月以内にペットを送ってあげてください');
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['file', 'mimes:gif,png,jpg,webp', 'max:3072'],
        ]);
    }
}
