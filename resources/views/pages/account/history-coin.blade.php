@extends('index')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Histori Perolehan Coin</h2>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tugas</th>
                                <th scope="col">Coin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($histories as $item)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $item->activity->activity_title }}</td>
                                    <td>+ {{ $item->activity->reward_point }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{ url('account/panel') }}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
