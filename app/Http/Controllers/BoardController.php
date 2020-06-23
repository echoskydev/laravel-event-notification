<?php

namespace App\Http\Controllers;

use App\Help;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function board()
    {
        return view('board');
    }


    public function useronline(Request $request)
    {
        // $users = \DB::table('sessions')
        //     ->distinct('user_id')
        //     ->where('user_id', '!=', '')
        //     ->join('users', 'users.id', '=', 'sessions.user_id')
        //     ->get()->reverse();

        $users = \DB::select('SELECT DISTINCT user_id, users.* FROM sessions INNER JOIN users ON users.id = sessions.user_id WHERE user_id != :id', ['id' => '']);

        return response()->json([
            'users' => $users
        ]);
    }


    public function alertall(Request $request, $userID)
    {
        $help = Help::where('user_id', $userID)->where('read', 0)->get();
        $totals = $help->count();
        return response()->json([
            'totals' => $totals,
            'help' => $help
        ]);
    }

    public function read(Request $request, $id)
    {
        $help = Help::find($id);
        $help->read = 1;
        $help->save();
        return redirect()->back();
    }
}
