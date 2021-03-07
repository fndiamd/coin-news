@extends('index')
@section('content')
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-xs-12">
                <div class="card">
                    <div class="card-header">Account Info</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('account/update') }}">
                            @csrf
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control"
                                            value="{{ explode(' ', $user->user_name)[0] }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control"
                                            value="{{ explode(' ', $user->user_name)[1] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ $user->user_email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="telp">No. Telp</label>
                                        <input type="text" id="telp" name="telp" class="form-control"
                                            value="{{ $user->user_telp }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control">{{$user->user_alamat}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
