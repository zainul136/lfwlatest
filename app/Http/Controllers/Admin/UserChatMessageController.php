<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChMessage;
use Chatify\ChatifyMessenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserChatMessageController extends Controller
{
    public function userChats()
    {
        $messages = ChMessage::query()
            ->selectRaw('IF(from_id < to_id, from_id, to_id) as user1, IF(from_id < to_id, to_id, from_id) as user2, MAX(created_at) as created_at, MAX(body) as body, MAX(id) as id')
            ->whereColumn('from_id', '<>', 'to_id')
            ->groupBy('user1', 'user2')
            ->get();

        return view('admin.zenix.usermodule.userChats',compact('messages'));
    }

    public function userMessageDetailsChats($from_id, $to_id){
        $messages = ChMessage::query()
            ->where(function ($query) use ($from_id, $to_id) {
                $query->where('from_id', $from_id)
                    ->where('to_id', $to_id);
            })
            ->orWhere(function ($query) use ($from_id, $to_id) {
                $query->where('from_id', $to_id)
                    ->where('to_id', $from_id);
            })
            ->orderBy('created_at')
            ->get();

        return view('admin.zenix.usermodule.userChatsDetails', compact('messages'));
    }

}
