@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col">
            <a href="{{url('admin/master/member')}}" class="btn btn-outline-secondary">&lsaquo; Kembali</a>
            <br>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Reward Coin</th>
                        <th scope="col">Date time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($histories as $item)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$item->activity->activity_title}}</td>
                            <td>+{{$item->activity->reward_point}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
