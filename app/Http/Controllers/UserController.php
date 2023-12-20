<?php

namespace App\Http\Controllers;

use App\Events\oneToOneMessage;
use App\Models\ChMessage;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashBoard()
    {
        $userInfo = User::whereNotIn('id', [auth()->user()->id])->get();
        return view('dashboard', ['UserInfo' => $userInfo]);
    }

    public function saveChate(Request $request)
    {
        try {
            $newChate = ChMessage::create([
                'from_id' => $request->sender_id,
                'to_id' => $request->reciver_id,
                'body' => $request->message
            ]);
            $testEvent = event(new oneToOneMessage($newChate));
            return response([
                'success' => true,
                'data' => $newChate,
                $testEvent
            ]);
        } catch (Exception $e) {
            return response([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
