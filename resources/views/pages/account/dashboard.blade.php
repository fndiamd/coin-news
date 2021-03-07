@extends('index')
@section('content')
    <br>

    <div class="container">
        <h2>Account Panel</h2>
        <br>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="list-group">
                    <a href="{{ url('account/panel') }}" class="list-group-item list-group-item-action">
                        Account Info
                    </a>
                    <a href="{{ url('account/panel') }}" class="list-group-item list-group-item-action">
                        Histori Hadiah
                    </a>
                    <a href="{{ url('account/history/coin') }}" class="list-group-item list-group-item-action">
                        Histori Coin
                    </a>
                    <a href="{{ url('change-password') }}" class="list-group-item list-group-item-action">
                        Ganti Password
                    </a>
                    <a href="{{ url('account/setting') }}" class="list-group-item list-group-item-action">
                        Ubah Informasi
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">Account Info</div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" id="first_name" name="first_name" disabled class="form-control"
                                            value="{{ explode(' ', $user->user_name)[0] }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" disabled class="form-control"
                                            value="{{ explode(' ', $user->user_name)[1] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" disabled class="form-control"
                                            value="{{ $user->user_email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="telp">No. Telp</label>
                                        <input type="text" id="telp" name="telp" disabled class="form-control"
                                            value="{{ $user->user_telp }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="5"
                                            class="form-control" disabled>{{ $user->user_alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="kode">Kode User</label>
                                        <input type="text" id="kode" name="kode" class="form-control" disabled
                                            value="{{ $user->user_code }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="coinku">Coinku</label>
                                        <input type="text" id="coinku" name="coinku" class="form-control" disabled
                                            value="{{ $user->user_point }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
