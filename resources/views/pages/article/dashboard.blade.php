@extends('index')
@section('content')
    <br>
    <div class="container">
        <a href="{{ url('create-article') }}" class="btn btn-outline-primary">Buat Artikel</a>
        <br>
        <br>
        <div class="row">
            @if ($articles->isEmpty())
                <div class="col">
                    <div class="empty-field text-muted">Kamu tidak memiliki artikel, buat artikel pertamamu sekarang!</div>
                </div>
            @else
                @foreach ($articles as $article)
                    <div class="col-12">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-3">
                                    <img src="{{ asset('assets/images/article/'.$article->article_thumbnail) }}" width="100%">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->article_title }}</h5>
                                        <p class="card-text">{{ substr($article->article_content, 0, 200) }}...</p>
                                        <br>
                                        <p class="card-text"><small class="text-muted">Last update {{ $article->updated_at->diffForHumans() }} oleh {{$article->user->user_name}}</small></p>
                                        <a href="{{ url('article/edit/'.$article->article_link) }}" class="card-link">Edit</a>
                                        <a href="{{ url('article/delete/'.$article->article_link )}}" class="card-link">Hapus</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
