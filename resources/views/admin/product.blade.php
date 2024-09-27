<body>
    @extends('admin/master_admin');                              
    @section('content')
    <div class="container">
        @if(session('product_add'))
                            <div class="alert alert-success" role="alert">
                                {{ session('product_add') }}
                            </div>
                            @endif
                            @if(session('product_not_add'))
                            <div class="alert alert-success" role="alert">
                                {{ session('product_not_add') }}
                            </div>
                            @endif
                            @if(session('product_edit'))
                            <div class="alert alert-success" role="alert">
                                {{ session('product_edit') }}
                            </div>
                            @endif
                            @if(session('product_delete'))
                            <div class="alert alert-success" role="alert">
                                {{ session('product_delete') }}
                            </div>
                            @endif
                            @if(session('product_active'))
                            <div class="alert alert-success" role="alert">
                                {{ session('product_active') }}
                            </div>
                            @endif
                            @if(session('product_deactive'))
                            <div class="alert alert-success" role="alert">
                                {{ session('product_deactive') }}
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
                                        <th class="th-sm">Product Image</th>
                                        <th class="th-sm">Product Name</th>
                                        <th class="th-sm">Product Type</th>
                                        <th class="th-sm">Gender</th>
                                        {{-- <th class="th-sm">Pro_price</th> --}}
                                        <th class="th-sm">View More</th>
                                        <th class="th-sm" colspan="3">Operation</th>
                                    </tr>
                                </thead>
                                @foreach ($p as $product)
                                <tbody>
                                    <tr>
                                        <td class="th-sm"><img src="{{ URL::to('/') }}/images/men/{{ $product['Pro_img'] }}" alt="" height="100px" width="100px"></td>
                                        <td class="th-sm">{{ $product['Pro_name'] }}</td>
                                        <td class="th-sm">{{ $product['Pro_type'] }}</td>
                                        <td class="th-sm">{{ $product['Gender'] }}</td>
                                        {{-- <td class="th-sm">Rs. {{ $product['Pro_price'] }}</td> --}}
                                        <td class="th-sm"><a href="{{ URL::to('/admin') }}/product_view_more/{{ $product['Pro_id'] }}"><button class="btn btn-outline-warning" >view more</button></a></td>
                                        <td class="th-sm"><a href="{{ URL::to('/admin') }}/product_edit/{{ $product['Pro_id'] }}"><button class="btn btn-outline-info" >Edit</button></a></td>
                                        <td class="th-sm"><a href="{{ URL::to('/admin') }}/product_delete/{{ $product['Pro_id'] }}"><button class="btn btn-outline-danger" >Delete</button></a></td>
                                        @if($product['Product_status']=='Available')
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/product_deactive/{{ $product['Pro_id'] }}"> <button class="btn btn-outline-success" >Deactive</button></a></td>
                                            @else
                                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/product_active/{{ $product['Pro_id'] }}"><button class="btn btn-outline-warning" >Active</button></a></td>
                                            @endif
                                    </tr>
                                </tbody>
            
                                @endforeach
                            </table>
                            <td class="th-sm"><a href="{{ URL::to('/admin') }}/product_add"> <button class="btn btn-info" >Add Product</button></a></td>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @endsection
</body>
