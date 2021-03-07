<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Article',
            'articles' => Article::with('user')->get()
        ];

        return view('admin.pages.article', $data);
    }
}
