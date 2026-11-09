<?php

namespace App\Http\Controllers;

use App\Events\GameMessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendPrivate(Request $request)
    {
        $msg    = $request->input('message');
        $gameId = $request->input('game_id');
        $from   = $request->input('from') ?? 'Anon';

        event(new GameMessageSent($msg, $gameId, $from));

        return response()->json(['status' => 'ok']);
    }
}
