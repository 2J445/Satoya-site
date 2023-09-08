<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        
    }
    public function show()
    {
        
    }
    public function new()
    {
        
    }
    public function create(array $data)
    {
        return Message::create([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'room_id' => $data['room_id'],
        ]);
    }
    public function store(Request $request)
    {
        //ユーザーIDを取得
        $user_id = Auth::id();
        $message = new Message;
        // フォームから送られてきたデータをそれぞれ代入
        $message->content = $request->content;
        $message->user_id = $user_id;
        $message->room_id = $request->room_id;
        // データベースに保存
        $message->save();
        return redirect('/room');
    }
}
