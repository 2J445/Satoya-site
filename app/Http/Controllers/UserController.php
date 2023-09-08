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
        return view('users.show', ['user' => $user, 'current_user'=> $current_user]);
    }
    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
    }
}
