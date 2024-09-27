<body>
    @extends('admin/master_admin');                              
    @section('content')
    <div class="container">
                            @if(session('add_to_cart_delete'))
                            <div class="alert alert-success" role="alert">
                                {{ session('add_to_cart_delete') }}
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
                                        <th class="th-sm">Pro Id</th>
                                        <th class="th-sm">Pro Image</th>
                                        <th class="th-sm">Pro name</th>
                                        <th class="th-sm">Email</th>
                                        <th class="th-sm">Quantity</th>
                                        <th class="th-sm">Size</th>
                                        <th class="th-sm" colspan="2">Operation</th>
                                    </tr>
                                </thead>
                                @foreach ($a as $cart)
                                <tbody>
                                    <tr>
                                        <td class="th-sm">{{ $cart['Pro_id'] }}</td>
                                        <td class="th-sm"><img src="{{ URL::to('/') }}/iamges/men/{{ $cart['Pro_img'] }}" alt=""></td>
                                        <td class="th-sm">{{ $cart['Pro_name'] }}</td>
                                        <td class="th-sm">{{ $cart['Email'] }}</td>
                                        <td class="th-sm">{{ $cart['Quantity'] }}</td>
                                        <td class="th-sm">{{ $cart['Size'] }}</td>
                                        <td class="th-sm"><a href="{{ URL::to('/admin') }}/add_to_cart_delete/{{ $cart['Pro_id'] }}"><button class="btn btn-outline-danger" >Delete</button></a></td>
                                    </tr>
                                </tbody>
            
                                @endforeach
                            </table>
                            {{-- <td class="th-sm"><a href="{{ URL::to('/admin') }}/order_add"> <button class="btn btn-info" >Add Order</button></a></td> --}}
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @endsection
</body>
