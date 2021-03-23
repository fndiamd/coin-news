@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kode User</th>
                        <th scope="col">Coin</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$user->user_name}}</td>
                            <td>{{$user->user_email}}</td>
                            <td>{{$user->user_telp}}</td>
                            <td>{{$user->user_alamat}}</td>
                            <td>{{$user->user_code}}</td>
                            <td>{{$user->user_point}}</td>
                            <td>
                                <a href="{{url('admin/master/member/history-coin/'.$user->user_id)}}" class="btn btn-outline-secondary">Histori Coin</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
