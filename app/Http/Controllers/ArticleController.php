<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('showDetail');
    }

    function create_slug($string)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Article Dashboard',
            'articles' => Article::where('user_id', Auth::user()->user_id)
                ->with('user')
                ->get()
        ];
        return view('pages.article.dashboard', $data);
    }

    public function showDetail($slug)
    {

        if ($article = Article::where('article_link', $slug)->with('user')->first()) {
            $data = [
                'article' => $article,
                'title' => $article->article_title,
                'comments' => Comment::where('article_id', $article->article_id)->with('user')->orderBy('created_at', 'desc')->get()
            ];
            return view('pages.article.detail', $data);
        }else{
            return redirect('/')->with('error', 'Ops! Article tidak ditemukan');
        }
        
    }

    public function showCreateForm()
    {
        return view('pages.article.create', ['title' => 'Create Article']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'thumbnail' => 'required|image'
        ]);

        $thumbnailName = $request->judul . '-' . time() . '.' . $request->thumbnail->extension();
        $saveImage = $request->thumbnail->move(public_path('assets/images/article'), $thumbnailName);

        if ($saveImage) {
            Article::create([
                'article_title' => $request->judul,
                'article_content' => $request->konten,
                'article_thumbnail' => $thumbnailName,
                'article_tag' => $request->tag,
                'article_link' => $this->create_slug($request->judul) . '-' . substr(md5(time()), 0, 5),
                'user_id' => Auth::user()->user_id
            ]);

            $user = User::find(Auth::user()->user_id);
            $user->user_point += 15;
            $user->save();
            $user->point_history()->create(['activity_id' => 3]);

            return redirect('/my-article')->with('success', 'Yeay! Artikelmu sudah terbit');
        }
    }

    public function showUpdateForm($slug)
    {
        $data = [
            'article' => Article::where('article_link', $slug)->first(),
            'title' => 'Edit Article'
        ];
        return view('pages.article.update', $data);
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'thumbnail' => 'image'
        ]);

        if ($request->thumbnail != null) {
            $thumbnailName = $request->judul . '-' . time() . '.' . $request->thumbnail->extension();
            $saveImage = $request->thumbnail->move(public_path('assets/images/article'), $thumbnailName);

            if ($saveImage) {
                Article::where('article_link', $slug)->update([
                    'article_title' => $request->judul,
                    'article_content' => $request->konten,
                    'article_thumbnail' => $thumbnailName,
                    'article_tag' => $request->tag
                ]);
            }
        } else {
            Article::where('article_link', $slug)->update([
                'article_title' => $request->judul,
                'article_content' => $request->konten,
                'article_tag' => $request->tag
            ]);
        }

        return redirect('/my-article')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy($slug)
    {
        Article::where('article_link', $slug)->delete();
        return redirect('/my-article')->with('success', 'Artikel berhasil dihapus');
    }
}
