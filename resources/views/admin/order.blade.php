<body>
    @extends('admin/master_admin');                              
    @section('content')
    <div class="container">
                            @if(session('order_delete'))
                            <div class="alert alert-success" role="alert">
                                {{ session('order_delete') }}
                            </div>
                            @endif
                            @if(session('order_notdeliver'))
                            <div class="alert alert-success" role="alert">
                                {{ session('order_notdeliver') }}
                            </div>
                            @endif
                            @if(session('order_deliver'))
                            <div class="alert alert-success" role="alert">
                                {{ session('order_deliver') }}
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
                                        <th class="th-sm">Id</th>
                                        <th class="th-sm">Pro Image</th>
                                        <th class="th-sm">Pay met</th>
                                        <th class="th-sm">O-date</th>
                                        <th class="th-sm">D-date</th>
                                        <th class="th-sm">Email</th>
                                        <th class="th-sm">Qua</th>
                                        <th class="th-sm">Size</th>
                                        <th class="th-sm">O-status</th>
                                        {{-- <th class="th-sm" colspan="2">Operation</th> --}}
                                    </tr>
                                </thead>
                                @foreach ($o as $order)
                                <tbody>
                                    <tr>
                                        <td class="th-sm">{{ $order['Order_id'] }}</td>
                                        <td class="th-sm"><img src="{{ URL::to('/') }}/images/men/{{ $order['Pro_img'] }}" alt="" height="100px" width="100px"></td>
                                        <td class="th-sm">{{ $order['Payment_method'] }}</td>
                                        <td class="th-sm">{{ $order['Order_date'] }}</td>
                                        <td class="th-sm">{{ $order['Delivery_date'] }}</td>
                                        <td class="th-sm">{{ $order['Email'] }}</td>
                                        <td class="th-sm">{{ $order['Quantity'] }}</td>
                                        <td class="th-sm">{{ $order['Size'] }}</td>
                                        <td class="th-sm">{{ $order['Order_status'] }}</td>
                                    </tr>
                                    <tr>
                                         {{-- <td class="th-sm"><a href="{{ URL::to('/admin') }}/product_view_more/{{ $product['Pro_id'] }}"><button class="btn btn-outline-warning" >view more</button></a></td> --}}
                                        {{-- <td class="th-sm"><a href="{{ URL::to('/admin') }}/product_edit/{{ $product['Pro_id'] }}"><button class="btn btn-outline-info" >Edit</button></a></td> --}}
                                        <td colspan="7"></td>
                                        <td class="th-sm"><a href="{{ URL::to('/admin') }}/order_delete/{{ $order['Order_id'] }}"><button class="btn btn-outline-danger" >Delete</button></a></td>
                                        @if($order['Order_status']=='Delivered')
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/order_notdeliver/{{ $order['Order_id'] }}"> <button class="btn btn-outline-success" >Not delivered</button></a></td>
                                            @else
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/order_deliver/{{ $order['Order_id'] }}"><button class="btn btn-outline-warning" >Delivered</button></a></td>
                                            @endif
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
