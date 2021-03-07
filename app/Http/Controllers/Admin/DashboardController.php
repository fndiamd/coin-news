<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\RewardHistory;
use App\Models\Rewards;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $data = [
            'title' => 'Dashboard',
            'user' => User::get(),
            'article' => Article::get(),
            'reward' => Rewards::get(),
            'request_redeem' => RewardHistory::where('reward_status', 0)->get()
        ];
        return view('admin.pages.dashboard', $data);
    }
}
