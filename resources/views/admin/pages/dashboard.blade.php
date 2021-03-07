@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Member</h5>
                    <h1>{{ count($user) }}</h1>
                    <a href="{{url('admin/master/member')}}" class="card-link btn btn-outline-secondary" style="float: right;">Go &rsaquo;</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Article</h5>
                    <h1>{{ count($article) }}</h1>
                    <a href="{{url('admin/master/article')}}" class="card-link btn btn-outline-secondary" style="float: right;">Go &rsaquo;</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reward</h5>
                    <h1>{{ count($reward) }}</h1>
                    <a href="{{url('admin/master/reward')}}" class="card-link btn btn-outline-secondary" style="float: right;">Go &rsaquo;</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Request Redeem</h5>
                    <h1>{{ count($request_redeem) }}</h1>
                    <a href="{{url('admin/transaction/redeem')}}" class="card-link btn btn-outline-secondary" style="float: right;">Go &rsaquo;</a>
                </div>
            </div>
        </div>
    </div>


@endsection
