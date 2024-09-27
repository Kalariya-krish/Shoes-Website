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
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="container">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="login-wrap p-4 p-md-5">
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4">Sign Up</h3>
                                    </div>

                                </div>
                                <form action="registration" class="signin-form" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="label" for="name">First name</label>
                                        <input type="text" class="form-control" placeholder="Username" name="first_name"
                                            value="{{ old('first_name') }}" >
                                        <span style="color: red; font-size: 12px;">
                                            @error('first_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="name">Last name</label>
                                        <input type="text" class="form-control" placeholder="last name" name="last_name"
                                            value="{{ old('last_name') }}" >
                                        <span style="color: red; font-size: 12px;">
                                            @error('last_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
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
                                    <div class="form-group mb-3">
                                        <label class="label" for="password">Profile Picture</label>
                                        <input type="file" class="form-control"
                                            name="profile_picture"value="{{ old('profile_picture') }}">
                                        <span style="color: red; font-size: 12px;">
                                            @error('profile_picture')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Sign Up"
                                            class="form-control btn btn-primary rounded submit px-3">
                                    </div>

                                </form>
                                <p class="text-center">Already Register? <a href="login">LogIn</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</body>

</html>
