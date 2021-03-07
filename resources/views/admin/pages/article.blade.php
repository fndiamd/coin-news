@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tag</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($articles as $item)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td style="max-width: 250px">{{$item->article_title}}</td>
                            <td>{{$item->user->user_name}}</td>
                            <td>{{$item->article_tag}}</td>
                            <td>
                                <a target="_blank" href="{{url('article/'.$item->article_link)}}" class="btn btn-outline-secondary">Baca</a>
                                <a href="{{url('admin/master/article/delete'.$item->article_id)}}" class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
