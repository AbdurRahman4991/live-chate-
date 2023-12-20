<?php

namespace App\Http\Controllers;

use App\Events\message;
use Illuminate\Http\Request;

class ChateController extends Controller
{
    public function Chating(Request $request)
    {
        event(new message($request->username, $request->message));
        return ['success' => true];
    }

    public $username;
    public $message;
}
