@extends('normal/master')

@section('content')
<div class="row">
    <div class="offset-lg-3 offset-md-3 col-6">
        <h5 align="center"> Change Password</h5>
        <form action="reset_pwd_action" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="password" class="form-control" placeholder="Enter New Password" name="npwd"
                        id="pwd1">
                    <span style="color:red">
                        @error('npwd')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="password" class="form-control" placeholder="Retype New Password"
                        name="npwd_confirmation" id="repwd1">
                    <span style="color:red">
                        @error('npwd_confirmation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-danger" name="submit">Change Password</button>
        </form>
    </div>
</div>
<br>
@endsection