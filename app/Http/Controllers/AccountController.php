<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = [
            'title' => Auth::user()->user_name,
            'user' => User::find(Auth::user()->user_id)
        ];
        return view('pages.account.dashboard', $data);
    }

    public function showSettingForm(){
        $data = [
            'title' => 'Account Setting',
            'user' => User::find(Auth::user()->user_id)
        ];
        return view('pages.account.setting', $data);
    }

    public function update(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required',
            'telp' => 'required',
            'alamat' => 'required|min:10'
        ]);

        $user = User::find(Auth::guard('member')->user()->user_id);
        $user->user_name = $request->first_name.' '.$request->last_name;
        $user->user_email = $request->email;
        $user->user_telp = $request->telp;
        $user->user_alamat = $request->alamat;
        if($user->user_verify == 0){
            $user->user_verify = 1;
            $user->user_point += 5;
            $user->point_history()->create(['activity_id' => 5]);
        }
        $user->save(); 
        return redirect('account/panel')->with('success', 'Data anda berhasil diperbarui');
    }
}
