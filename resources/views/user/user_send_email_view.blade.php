{{-- http://127.0.0.1:8000/account_activation/{{ $data['email'] }} --}}
<p style="font-size: 16px;
line-height: 1.5;
margin-bottom: 15px;">Dear {{ $data['name'] }},</p>

    <p style="font-size: 16px;
    line-height: 1.5;
    margin-bottom: 15px;">Thank you for signing up for our service. To activate your account, please click the button below:</p>

    <a href="{{ route('activate.account', ['token' => $data['token']]) }}"><button style="color: #007bff;
        text-decoration: none;
    display: inline-block;
    padding: 10px 20px;
    margin-top: 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;" class="btn btn-primary">Activate Account</button></a>

    <p style="font-size: 16px;
    line-height: 1.5;
    margin-bottom: 15px;">If you can't click the button, you can also copy and paste the following URL into your browser:</p>

    <p style="font-size: 16px;
    line-height: 1.5;
    margin-bottom: 15px;">{{ route('activate.account', ['token' => $data['token']]) }}</p>

    <p style="font-size: 16px;
    line-height: 1.5;
    margin-bottom: 15px;">If you did not sign up for our service, please disregard this email.</p>

    <p style="font-size: 16px;
    line-height: 1.5;
    margin-bottom: 15px;">Thank you,<br>Your Company Name</p>