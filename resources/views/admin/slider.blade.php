<body>
    @extends('admin/master_admin');                              
    @section('content')
    <div class="container">
                            @if(session('slider_edit'))
                            <div class="alert alert-success" role="alert">
                                {{ session('slider_edit') }}
                            </div>
                            @endif
                            @if(session('slider_add'))
                            <div class="alert alert-success" role="alert">
                                {{ session('slider_add') }}
                            </div>
                            @endif
                            @if(session('slider_delete'))
                            <div class="alert alert-success" role="alert">
                                {{ session('slider_delete') }}
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
                                        <th class="th-sm"> Id</th>
                                        <th class="th-sm"> Image</th>
                                        <th class="th-sm" colspan="2">Operation</th>
                                    </tr>
                                </thead>
                                @foreach ($s as $slider)
                                <tbody>
                                    <tr>
                                        <td class="th-sm">{{ $slider['id'] }}</td>
                                        <td class="th-sm"><img src="{{ URL::to('/') }}/images/slider/{{ $slider['Image'] }}" alt=""></td>
                                        <td class="th-sm"><a href="{{ URL::to('/admin') }}/slider_edit/{{ $slider['id'] }}"><button class="btn btn-outline-info" >Edit</button></a></td>
                                        <td class="th-sm"><a href="{{ URL::to('/admin') }}/slider_delete/{{ $slider['id'] }}"><button class="btn btn-outline-danger" >Delete</button></a></td>
                                    </tr>
                                </tbody>
            
                                @endforeach
                            </table>
                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/slider_add"> <button class="btn btn-info" >Add Slider</button></a></td>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @endsection
</body>
