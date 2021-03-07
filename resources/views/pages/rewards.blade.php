@extends('index')
@section('content')
    <div class="content">
        <div class="container">
            <p>Berikut daftar hadiah yang bisa kamu dapatkan</p>
            @auth
                <p>Coin kamu saat ini : {{ $user->user_point }} coin</p>
            @endauth

            <div class="row justify-content-md-center">
                @foreach ($rewards as $reward)
                    <div class="col-md-4 col-sm-12">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $reward->reward_title }}</h5>
                                <hr>
                                <p class="card-text" style="min-height: 70px">{{ $reward->reward_description }}</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                {{ $reward->reward_cost }} Coin
                                @auth
                                    @if ($user->user_point >= $reward->reward_cost)
                                        <a href="{{ url('reward/redeem/' . $reward->reward_id) }}"
                                            class="btn btn-outline-success" style="float:right">Tukar</a>
                                    @else
                                        <a href="{{ url('reward/redeem/' . $reward->reward_id) }}"
                                            class="btn btn-outline-secondary" style="float:right">Tukar</a>
                                    @endif

                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
