<?php

namespace Level7up\Dashboard\Http\Controllers;

use Level7up\Dashboard\Models\User;



class ChatController extends Controller
{
    public function get_chat($id)
    {
        $user = User::find($id);
        return view('dashboard::pages.chat.chat', compact('user'));
    }
}
