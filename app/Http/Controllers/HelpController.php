<?php

namespace App\Http\Controllers;

use App\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function help(Request $request)
    {
        $user = Auth::user();
        $help = new Help();
        $help->user_id = $user->id;
        $help->message = $request->message;
        $help->read = 0;
        $help->save();

        event(new \App\Events\SendNotification($request->message, $user));
        return redirect()->back();
    }

}
