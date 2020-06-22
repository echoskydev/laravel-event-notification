<?php

namespace App\Http\Controllers;

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
        event(new \App\Events\SendNotification($request->message, $user));
        return redirect()->back();
    }
}
