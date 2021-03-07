<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RewardHistory;
use Illuminate\Http\Request;

class RedeemController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Redeem Request',
            'rewards' => RewardHistory::with('user')->with('reward')->get()
        ];

        return view('admin.pages.redeem', $data);
    }

    public function accept($id){
        $redeem = RewardHistory::find($id);
        $redeem->reward_status = 1;
        $redeem->save();
        return redirect('admin/transaction/redeem')->with('success', 'Penukaran hadiah telah disetujui');
    }
}
