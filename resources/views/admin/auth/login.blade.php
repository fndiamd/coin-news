<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Config::get('app.name', 'NewsCoin') }} - Admin Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-6 col-sm-12">
                    <h2 class="text-center">Admin Login</h2>
                    <hr>
                    <div class="card">
                        <div class="card-body form-shadow">
                            <form method="POST" action="{{ url('admin/login') }}">
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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
