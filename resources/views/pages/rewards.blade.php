@extends('index')
@section('content')
    <br>
    <div class="container">
        <p>Berikut daftar hadiah yang bisa kamu dapatkan</p>
        <div class="row justify-content-md-center">
            @foreach ($rewards as $reward)
                <div class="col-md-4 col-sm-12">
                    <div class="card border-danger mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $reward->reward_title }}</h5>
                            <hr>
                            <p class="card-text" style="min-height: 70px">{{ $reward->reward_description }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-danger">
                            {{ $reward->reward_cost }} Coin
                            @auth
                                <a href="{{ url('reward/redeem/' . $reward->reward_id) }}" class="btn btn-danger"
                                    style="float:right">Tukar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
