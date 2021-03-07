<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'recent_articles' => Article::orderBy('created_at', 'desc')->with('user')->take(4)->get(),
            'all_article' => Article::orderBy('updated_at', 'desc')->with('user')->get(),
            'title' => 'Beranda'
        ];

        return view('pages.home', $data);
    }
}
