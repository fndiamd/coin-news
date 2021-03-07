@extends('index')
@section('content')
    <br>
    <p class="text-center">Berikut tugas yang bisa diselesaikan untuk mendapatkan coin : </p>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header card-header-red">
                        Tugas
                    </div>
                    <div class="list-group">
                        @foreach ($activities as $item)
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{$item->activity_title}}</h5>
                                    <small>+{{$item->reward_point}} coin</small>
                                </div>
                                <p class="mb-1">{{$item->activity_description}}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
