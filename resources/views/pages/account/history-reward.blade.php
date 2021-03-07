@extends('index')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Histori Hadiah</h2>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hadiah</th>
                                <th scope="col">Coin Dipakai</th>
                                <th scope="col">Tanggal Penukaran</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($histories as $item)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $item->reward->reward_title }}</td>
                                    <td>- {{ $item->reward->reward_cost }}</td>
                                    <td>{{ date_format($item->created_at, 'H:i | D M Y') }}</td>
                                    <td>
                                        @if ($item->reward_status == 0)
                                            <span class="badge badge-secondary">Diproses</span>
                                        @else
                                            <span class="badge badge-success">Sukses</span>
                                        @endif
                                    </td>
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
