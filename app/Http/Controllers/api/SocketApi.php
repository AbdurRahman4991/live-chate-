<?php

namespace App\Http\Controllers\api;

use App\Events\message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocketApi extends Controller
{
    public function Chate(Request $request)
    {
        event(new message($request->username, $request->message));
        return ['success' => true];
    }
}
