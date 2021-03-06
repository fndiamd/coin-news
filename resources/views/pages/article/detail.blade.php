@extends('index')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">{{ $article->article_title }}</div>
                        <img src="{{ asset('assets/images/article/' . $article->article_thumbnail) }}"
                            class="card-img-top" style="max-height:500px">
                        <div class="card-body">
                            <p class="card-text article-content">{{ $article->article_content }}</p>
                            <p class="card-text"><small class="text-muted">Oleh {{ $article->user->user_name }} •
                                    {{ $article->created_at }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <div class="row justify-content-md-center">

                <div class="col" style="max-height: 400px; overflow-y:scroll;">
                    @if ($comments->isEmpty())
                        <div class="text-muted text-center">------------ Belum ada komentar -----------</div>
                    @endif
                    @foreach ($comments as $comment)
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>{{ $comment->comment }}</p>
                                    <footer class="blockquote-footer">{{ $comment->user->user_name }},
                                        {{ $comment->created_at->diffForHumans() }}</footer>
                                </blockquote>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>

                <div class="col">
                    @auth
                        <form method="POST" action="{{ url('comment/' . $article->article_id) }}">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment" class="form-control" id="comment" rows="5"
                                    placeholder="Tuliskan komentarmu...."></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">Kirim</button>
                        </form>
                    @endauth
                </div>

            </div>

        </div>
    </div>
@endsection
