<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PointHistory;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Member',
            'users' => User::get()
        ];
        return view('admin.pages.member.index', $data);
    }

    public function historyCoin($id){
        $user = User::find($id);
        $data = [
            'title' => 'History Coin '.$user->user_name,
            'histories' => PointHistory::where('user_id', $id)->with('activity')->get()
        ];

        return view('admin.pages.member.history-coin', $data);
    }
}
