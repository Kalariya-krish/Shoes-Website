<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Metas -->
    <title>The Brand</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

<body>
    @extends('normal/master')
    @section('content')
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <div class="login-wrap p-4 p-md-5">
                            @if(session('login_error'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                {{ session('login_error') }}
                            </div>
                            @endif
                            @if(session('activation_error'))
                          <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                              {{ session('activation_error') }}
                          </div>
                          @endif
                          @if(session('active_success'))
                          <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                              {{ session('active_success') }}
                          </div>
                          @endif
                            <div class="d-flex">
                                <div class="w-100">
                                    <h2 class="mb-4">Sign In</h2>
                                </div>
                            </div>
                            <form action="login_user" action="login" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="{{ old('email') }}" >
                                    <span style="color: red; font-size: 12px;">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                        value="{{ old('password') }}" >
                                    <span style="color: red; font-size: 12px;">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="submit" value="Sign In"
                                                class="form-control btn btn-primary rounded submit px-3">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="text-center"><a href="{{ URL::to('/') }}/forget_password_form">Forget Password ?</a>
                                        </p>
                                    </div>
                                </div>

                            </form>
                            <p class="text-center">Dont have an account ? <a href="registration">Register</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </section>
    @endsection
</body>

</html>
