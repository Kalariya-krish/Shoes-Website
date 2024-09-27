<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Brand</title>
</head>

<body>
    @extends('user/master_user')
    @section('content')
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <div class="login-wrap p-4 p-md-5">
                            @if(session('change_success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('change_success') }}
                            </div>
                            @endif
                            @if(session('change_error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('change_error') }}
                            </div>
                            @endif
                            <div class="d-flex">
                                <div class="w-100">
                                    <h2 class="mb-4">Change Password</h2>
                                </div>
                            </div>
                            <form action="change_password" action="login" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Current Password</label>
                                    <input type="password" class="form-control" name="current_password"
                                        value="{{ old('current_password') }}" >
                                        <span style="font-size: 12px; color:red;">
                                            @error('current_password')
                                                <div style="margin-bottom:20px;">{{ $message }}</div>
                                            @enderror
                                            @if ($errors->has('error'))
                                    <div style=" margin-bottom:20px;">{{ $errors->first('error') }}</div>
                                    @endif
                                        </span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">New Password</label>
                                    <input type="text" class="form-control" name="new_password"
                                        value="{{ old('new_password') }}" >
                                    <span style="color: red; font-size: 12px;">
                                        @error('new_password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Confirm Password</label>
                                    <input type="password" class="form-control" name="new_password_confirmation"
                                        value="{{ old('new_password_confirmation') }}" >
                                    <span style="color: red; font-size: 12px;">
                                        @error('new_password_confirmation')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Change"
                                        class="form-control btn btn-primary rounded submit px-3">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </section>
    @endsection
</body>

</html>
