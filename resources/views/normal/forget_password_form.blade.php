@extends('normal/master')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!! </strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!! </strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!! </strong> {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="offset-lg-3 offset-md-3 col-6"><br><br>
                <h5>Forgot Password</h5>

                <br>
                <form method="post" action="{{ URL::to('/') }}/forget_password_form_submit">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="em" placeHolder="Email" id="em1" class="form-control">
                            <span style="color:red">
                                @error('em')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="text-align:center;">
                        <div class="col-6">
                            <input type="submit" value="Send Verification Email" name="btn_forget" class="btn btn-danger">
                        </div>
                        <div class="col-6">
                            <input type="reset" value="Reset" name="btn-message" class="btn btn-danger">
                        </div>
                    </div>
                    <br>
                    <div class="row" style="text-align:center;">
                        <div class="col-6">
                            <p> Don't have an Account? &nbsp;&nbsp;<a href="registration"> <input type="Button"
                                        value="Create Account" name="btn-message" class="btn btn-danger"></a></p>
                        </div>
                        <div class="col-6">
                            <p> Already have an Account?<a href="login"> <input type=" Button" value="Login"
                                        name="btn-message" class="btn btn-danger"></a></p>
                        </div>
                    </div>

                    <div class="row" style="text-align:center;">
                      
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection