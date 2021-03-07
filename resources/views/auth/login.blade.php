@extends('index')
<?php $title = 'Login'; ?>
@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body form-shadow">
                            <form method="POST" action="{{ url('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="email">Email <span class="required-field">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="example@mail.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="password">Password <span class="required-field">*</span></label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Password must be 8-16 character">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
