<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <title>The Brand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    @extends('admin/master_admin')
    @section('content')
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-9 col-12">
                        <h4 class="mb-4">Add user</h4>
                    </div>
                    <div class="col-lg-2 col-12"></div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    
                    <form class="custom-form contact-form" action="{{ URL::to('/admin') }}/user_insert" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-10 col-12">
                                <div class="row"  style="margin-bottom:20px;">
                                        <div class="col-lg-6 col-12">
                                            <label for="last-name">First name</label>
                                            <input type="text" name="first_name" class="form-control"
                                                value="{{ old('first_name') }}">
                                                <span style="font-size: 12px; color:red">
                                                    @error('first_name')
                                                        <div>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </span>
                                        </div>
    
                                        <div class="col-lg-6 col-12">
                                            <label for="last-name">Last name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ old('last_name') }}">
                                                <span style="font-size: 12px; color:red">
                                                    @error('last_name')
                                                        <div>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </span>
                                        </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                <div class="col">
                                    <label for="last-name">Mobile no</label>
                                    <input type="text" name="mobile_no" class="form-control"
                                        value="{{ old('mobile_no') }}">
                                        <span style="font-size: 12px; color:red">
                                            @error('mobile_no')
                                                <div>{{ $message }}
                                                </div>
                                            @enderror
                                        </span>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom:20px;">
                                <div class="col">
                                    <label for="last-name">Addrees</label>
                                    <input type="text" name="address" class="form-control"
                                        value="{{ old('address') }}">
                                        <span style="font-size: 12px; color:red">
                                            @error('address')
                                                <div>{{ $message }}
                                                </div>
                                            @enderror
                                        </span>
                                </div>
                            </div>


                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">City</label>
                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('city')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Pin code</label>
                                        <input type="text" name="pin_code" class="form-control"
                                            value="{{ old('pin_code') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('pin_code')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col">
                                        <label for="last-name">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('email')
                                                    <div style="margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="col">
                                        <label for="last-name">Password</label>
                                        <input type="email" name="password" class="form-control"
                                            value="{{ old('password') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('password')
                                                    <div style="margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col">
                                        <label for="last-name">Bank name</label>
                                        <input type="text" name="bank_name" class="form-control"
                                            value="{{ old('bank_name') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('bank_name')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="row"  style="margin-bottom:20px;">
                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Account no</label>
                                        <input type="text" name="account_no" class="form-control"
                                            value="{{ old('account_no') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('account_no')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">IFSC code</label>
                                        <input type="text" name="ifsc_code" class="form-control"
                                            value="{{ old('ifsc_code') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ifsc_code')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-6">
                                    <button type="submit" class="form-control">Update</button>
                                </div><br><br>
                            </div>
                        </div>
                    </form>
                    <div class="col"></div>
                </div>
            </div>
    @endsection
</body>

</html>
