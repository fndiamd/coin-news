<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PointHistory;

class RegisterController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        $data = [
            'title' => 'Register',
        ];
        return view('pages.register', $data);
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required|unique:users,user_email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::create([
            'user_name' => $request->first_name.' '.$request->last_name,
            'user_email' => $request->email,
            'user_password' => bcrypt($request->password),
            'user_code' => strtoupper(substr(md5(time()), 0, 5)),
            'user_reffer' => $request->reffer_code,
            'user_point' => 10
        ]);

        if($user->user_reffer != null){
            $reff_user = User::where('user_code', $user->user_reffer)->first();
            $reff_user->user_point = $reff_user->user_point + 20;
            $reff_user->save();
            $reff_user->point_history()->create(['activity_id' => 2]);
        }

        $user->point_history()->create(['activity_id' => 1]);

        return redirect('/')->with('success', 'Your account will be active as soon as possible');
    }
}
