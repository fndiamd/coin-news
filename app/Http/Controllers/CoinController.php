<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\PointHistory;
use Illuminate\Support\Facades\Auth;

class CoinController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Dapatkan coin',
            'activities' => Activity::get()
        ];
        return view('pages.earn-coin', $data);
    }

    public function historyCoin(){
        $data = [
            'title' => 'History Coin',
            'histories' => PointHistory::where('user_id', Auth::user()->user_id)->with('activity')->get()
        ];
        return view('pages.account.history-coin', $data);
    }
}
