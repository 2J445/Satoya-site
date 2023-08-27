<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
      // データベース内のすべてのpostを取得し、post変数に代入
      $posts = Post::all();
      // 'posts'フォルダ内の'index'viewファイルを返す。
      // その際にview内で使用する変数を代入します。
      return view('posts/index', ['posts' => $posts]);
    }
    
    public function show($id)
    {
      $post = Post::find($id); // idでPostを探し出す
      return view('posts.show', ['post' => $post]);
    }
    
    public function create () 
    {
        return view('posts/create');
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
      // 新しい Item を作成
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
}
