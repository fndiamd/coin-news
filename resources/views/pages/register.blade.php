@extends('index')

@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body form-shadow">
                        <form method="POST" action="{{ url('register') }}">
                            @csrf
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-6">
                                        <label for="first_name">First Name <span class="required-field">*</span></label>
                                        <input type="text" id="first_name" name="first_name" class="form-control"
                                            placeholder="First name">
                                    </div>
                                    <div class="col-6">
                                        <label for="last_name">Last Name <span class="required-field">*</span></label>
                                        <input type="text" id="last_name" name="last_name" class="form-control"
                                            placeholder="Last name">
                                    </div>
                                </div>
                            </div>
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
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="confirm_password">Confirm Password <span
                                                class="required-field">*</span></label>
                                        <input type="password" id="confirm_password" name="confirm_password"
                                            class="form-control" placeholder="Confirm your password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="reffer_code">Reffer code <span class="optional-field">( Optional
                                                )</span></label>
                                        <input type="text" id="reffer_code" name="reffer_code" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger">Register now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
