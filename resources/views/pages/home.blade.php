@extends('index')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Baca berita dapat hadiah!</h1>
            <p class="lead">
                Kamu punya bakat <em>copywriter</em>? hobby menulis? hobby membaca?
                <br>
                Pas banget! Kamu bisa dapatin hadiah dari hobby kamu disini, tunggu apalagi? Buruan daftar!
            </p>
            <hr class="my-4">
            <a class="btn btn-warning btn-lg" href="{{ url('register') }}" role="button">Daftar Sekarang</a>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="section-row">
                <h2 class="section-title">Berita terbaru</h2>
                <div class="row">
                    @if ($all_article->isEmpty())
                        <div class="col-12">Berita terbaru masih belum tersedia.</div>
                    @endif
                    @foreach ($recent_articles as $article)
                        <div class="col-3">
                            <div class="card">
                                <a href="{{ url('article/' . $article->article_link) }}">
                                    <img src="{{ asset('assets/images/article/' . $article->article_thumbnail) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            {{ $article->article_title }}
                                        </h6>
                                    </div>
                                    <div class="card-footer text-muted" style="font-size: 12px">
                                        {{ $article->user->user_name }} • {{ $article->created_at->diffForHumans() }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="section-row">
                <h2 class="section-title">Semua Berita</h2>
                <div class="row">
                    @if ($all_article->isEmpty())
                        <div class="col-12">Berita masih belum tersedia.</div>
                    @endif
                    @foreach ($all_article as $item)
                        <div class="col-12" style="margin-bottom:10px">
                            <div class="card">
                                <a href="{{ url('article/' . $item->article_link) }}">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img src="{{ asset('assets/images/article/' . $item->article_thumbnail) }}"
                                                width="100%">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->article_title }}</h5>
                                                <p class="card-text">{{ substr($item->article_content, 0, 150) }}...</p>
                                                <br>
                                                <p class="card-text"><small
                                                        class="text-muted">{{ $item->user->user_name }}
                                                        • {{ $item->created_at->diffForHumans() }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
