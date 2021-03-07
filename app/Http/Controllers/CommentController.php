<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $articleId){
        $request->validate([
            'comment' => 'required'
        ]);

        $comment = Comment::create([
            'article_id' => $articleId,
            'user_id' => Auth::user()->user_id,
            'comment' => $request->comment
        ]);

        if($comment){
            $user = User::find(Auth::user()->user_id);
            $user->user_point = $user->user_point + 1;
            $user->save();
            $user->point_history()->create(['activity_id' => 4]);
        }

        return back();
    }
}
