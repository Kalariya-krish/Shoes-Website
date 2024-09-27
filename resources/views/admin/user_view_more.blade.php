@extends('admin/master_admin')

@section('content')

<div class="conta">
    <h3>About {{ $person['First_name']}}</h3>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-7">
        <table class="table table-hover table-bordered results" style="width: 800px;">
            <tr>
                <th>Profile Picture</th><td><img src="{{ URL::to('/') }}/images/registration/{{ $person['Profile_picture'] }}" alt="" height="100px" width="100px"></td>
            </tr>
            <tr>
                <th>First Name</th><td>{{ $person['First_name'] }}</td>
            </tr>
            <tr>
                <th>Last Name</th><td>{{ $person['Last_name'] }}</td>
            </tr>
            <tr>
                <th>Mobile no</th><td>{{ $person['Mobile_no'] }}</td>
            </tr>
            <tr>
                <th>Address</th><td>{{ $person['Address'] }}</td>
            </tr>
            <tr>
                <th>City</th><td>{{ $person['City'] }}</td>
            </tr>
            <tr>
                <th>Pin code</th><td>{{ $person['Pin_code'] }}</td>
            </tr>
            <tr>
                <th>Bank name</th><td>{{ $person['Bank_name'] }}</td>
            </tr>
            <tr>
                <th>Account Number</th><td>{{ $person['Account_no'] }}</td>
            </tr>
            <tr>
                <th>Ifsc code</th><td>{{ $person['Ifsc_code'] }}</td>
            </tr>
            <tr>
                <th>Email</th><td>{{ $person['Email'] }}</td>
            </tr>
            <tr>
                <th>Status</th><td>{{ $person['Status'] }}</td>
            </tr>
        </table>
    </div>
    </div>
</div>

@endsection