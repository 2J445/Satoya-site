<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Room;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $myUser = Auth::id();
        $rooms= Room::orderBy('id','desc')
                             ->where('applicant_id', '=', $myUser)
                             ->orWhere('poster_id', '=', $myUser)
                             ->with('user')
                             ->get();
        return view('rooms/index', ['rooms' => $rooms, 'user'=> $user]);
    }
    
    public function show($id)
    {
        $user = Auth::user();
        $room = Room::find($id); // idでRoomを探し出す
        $messages = Message::where('room_id', '=', $room['id'])->get();
        $current_user = Auth::id();
        return view('rooms.show', ['room' => $room, 'current_user'=> $current_user, 'messages'=>$messages, 'user'=> $user]);
    }
    
    protected function create(array $data)
    {
        return Room::create([
            'title' => $data['title'],
            'applicant_id' => $data['applicant_id'],
            'poster_id' => $data['poster_id'],
            'post_id' => $data['post_id'],
        ]);
    }
    
    public function new()
    {
        
    }
    
    public function store(Request $request)
    {
      //ユーザーIDを取得
      $applicant_id = Auth::id();
      $room = new Room;
      // フォームから送られてきたデータをそれぞれ代入
      $room->title = $request->title;
      $room->applicant_id = $applicant_id;
      $room->poster_id = $request->poster_id;
      $room->post_id = $request->post_id;
      // データベースに保存
      $room->save();
      return redirect('/')->with('flash_message', '応募しました');
    }
    
    protected function validator(array $data)
    {
    }
    
}
