<?php

namespace App\Http\Controllers;

use App\Models\Rewards;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Rewards',
            'rewards' => Rewards::get()
        ];
        return view('pages.rewards', $data);
    }

    public function redeem($id){
        $selectedReward = Rewards::find($id);
        $user = User::find(Auth::user()->user_id);
        if($user->user_point >= $selectedReward->reward_cost){
            if($user->user_verify == 0){
                return redirect('account-panel')->with('error', 'Lengkapi data diri kamu terlebih dahulu');
            }

            $user->user_point -= $selectedReward->reward_cost;
            $user->save();
            $user->reward_history()->create([
                'reward_id' => $selectedReward->reward_id
            ]);
            return redirect('account/panel')->with('success', 'Hadiah akan dikirimkan sesuai data yang anda punya');
        }else{
            return back()->with('error', 'Coin kamu tidak cukup untuk ditukarkan');
        }
    }
}
