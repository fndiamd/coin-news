<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rewards;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Reward',
            'rewards' => Rewards::get()
        ];

        return view('admin.pages.reward.index', $data);
    }

    public function showCreateForm()
    {
        $data = ['title' => 'Create Reward'];
        return view('admin.pages.reward.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'reward_title' => 'required',
            'reward_description' => 'required',
            'reward_cost' => 'required'
        ]);

        Rewards::create([
            'reward_title' => $request->reward_title,
            'reward_description' => $request->reward_description,
            'reward_cost' => $request->reward_cost
        ]);

        return redirect('/admin/master/reward')->with('success', 'Reward berhasil ditambahkan');
    }

    public function showUpdateForm($id)
    {
        $data = [
            'title' => 'Update Reward',
            'reward' => Rewards::find($id)
        ];
        return view('admin.pages.reward.update', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reward_title' => 'required',
            'reward_description' => 'required',
            'reward_cost' => 'required'
        ]);

        Rewards::where('reward_id', $id)->update([
            'reward_title' => $request->reward_title,
            'reward_description' => $request->reward_description,
            'reward_cost' => $request->reward_cost
        ]);

        return redirect('/admin/master/reward')->with('success', 'Reward berhasil diubah');
    }

    public function destroy($id)
    {
        Rewards::find($id)->delete();
        return redirect('/admin/master/reward')->with('success', 'Reward berhasil dihapus');
    }
}
