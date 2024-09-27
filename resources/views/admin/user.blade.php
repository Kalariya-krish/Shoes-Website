<body>
        @extends('admin/master_admin');                              
        @section('content')
        <div class="container">
            @if(session('user_add'))
            <div class="alert alert-success" role="alert">
                {{ session('user_add') }}
            </div>
            @endif
            @if(session('user_not_add'))
            <div class="alert alert-success" role="alert">
                {{ session('user_not_add') }}
            </div>
            @endif
            @if(session('user_edit'))
            <div class="alert alert-success" role="alert">
                {{ session('user_edit') }}
            </div>
            @endif
            @if(session('user_delete'))
            <div class="alert alert-success" role="alert">
                {{ session('user_delete') }}
            </div>
            @endif
            @if(session('user_active'))
            <div class="alert alert-success" role="alert">
                {{ session('user_active') }}
            </div>
            @endif
            @if(session('user_deactive'))
            <div class="alert alert-success" role="alert">
                {{ session('user_deactive') }}
            </div>
            @endif
            <div class="row">
                <div class="col">
                    <div class="main-panel">
                        
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover table-bordered results">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">Profile Picture</th>
                                            <th class="th-sm">First Name</th>
                                            <th class="th-sm">Last Name</th>
                                            <th class="th-sm">Email</th>
                                            <th class="th-sm">View More</th>
                                            <th class="th-sm" colspan="3">Operation</th>
                                        </tr>
                                    </thead>
                                    @foreach ($u as $user)
                                    <tbody>
                                        <tr>
                                            <td class="th-sm"><img src="{{ URL::to('/') }}/images/registration/{{ $user['Profile_picture'] }}" alt="" height="50px" width="50px;"></td>
                                            <td class="th-sm">{{ $user['First_name'] }}</td>
                                            <td class="th-sm">{{ $user['Last_name'] }}</td>
                                            <td class="th-sm">{{ $user['Email'] }}</td>
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/user_view_more/{{ $user['Email'] }}"><button class="btn btn-outline-warning" >view more</button></a></td>
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/user_edit/{{ $user['Email'] }}"><button class="btn btn-outline-info" >Edit</button></a></td>
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/user_delete/{{ $user['Email'] }}"><button class="btn btn-outline-danger" >Delete</button></a></td>
                                            @if($user['Status']=='Active')
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/user_deactive/{{ $user['Email'] }}"> <button class="btn btn-outline-success" >Deactive</button></a></td>
                                            @else
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/user_active/{{ $user['Email'] }}"><button class="btn btn-outline-warning" >Active</button></a></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                <td class="th-sm"><a href="{{ URL::to('/admin') }}/user_add"> <button class="btn btn-info" >Add user</button></a></td>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        @endsection
</body>
