@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Reward</th>
                        <th scope="col">Status Reward</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($rewards as $item)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $item->user->user_name }}</td>
                            <td>{{ $item->reward->reward_title }}</td>
                            <td>
                                @if ($item->reward_status)
                                    <span class="badge badge-success">Sukses</span>

                                @else
                                    <span class="badge badge-secondary">Menunggu konfirmasi</span>
                                @endif
                            </td>
                            <td>
                                @if (!$item->reward_status)
                                    <a href="{{ url('admin/transaction/redeem/accept/' . $item->history_id) }}"
                                        class="btn btn-outline-success">Konfirmasi</a>
                                    <a href="{{ url('admin/transaction/redeem/decline/' . $item->history_id) }}"
                                        class="btn btn-outline-danger">Tolak</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
