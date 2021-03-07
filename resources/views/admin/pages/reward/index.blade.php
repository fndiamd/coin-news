@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{url('admin/master/reward/add')}}" class="btn btn-outline-primary">Add Reward</a>
            <br>
            <br>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Reward</th>
                        <th scope="col">Description</th>
                        <th scope="col">Reward Cost</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($rewards as $item)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $item->reward_title }}</td>
                            <td style="max-width: 250px">{{ $item->reward_description }}</td>
                            <td>{{ $item->reward_cost }}</td>
                            <td>
                                <a href="{{ url('admin/master/reward/edit/' . $item->reward_id) }}"
                                    class="btn btn-outline-secondary">Edit</a>
                                <a href="{{ url('admin/master/reward/delete/' . $item->reward_id) }}"
                                    class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
