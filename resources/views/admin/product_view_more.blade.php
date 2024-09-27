@extends('admin/master_admin')

@section('content')

<div class="conta">
    <h5>About {{ $product['Pro_name']}}</h5><br>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-7">
        <table class="table table-hover table-bordered results" style="width: 800px;">
            <tr>
                <th>Product Image</th><td><img src="{{ URL::to('/') }}/images/men/{{ $product['Pro_img'] }}" alt="" height="100px" width="100px"></td>
            </tr>
            <tr>
                <th>Product Name</th><td>{{ $product['Pro_name'] }}</td>
            </tr>
            <tr>
                <th>Product type</th><td>{{ $product['Pro_type'] }}</td>
            </tr>
            <tr>
                <th>Gender</th><td>{{ $product['Gender'] }}</td>
            </tr>
            <tr>
                <th>Product Price</th><td>{{ $product['Pro_price'] }}</td>
            </tr>
            <tr>
                <th>Color</th><td>{{$product['Color'] }}</td>
            </tr>
            <tr>
                <th>Available size</th><td>6-{{ $product['Ava_size_6'] }},6-{{ $product['Ava_size_6'] }},7-{{ $product['Ava_size_7'] }},9-{{ $product['Ava_size_9'] }},</td>
            </tr>
            <tr>
                <th>Other Images</th><td><img src="{{ URL::to('/') }}/images/men/{{ $product['Other_img1'] }}" alt="" height="100px" width="100px"><img src="{{ URL::to('/') }}/images/men/{{ $product['Other_img2'] }}" alt="" height="100px" width="100px"><img src="{{ URL::to('/') }}/images/men/{{ $product['Other_img3'] }}" alt="" height="100px" width="100px"><img src="{{ URL::to('/') }}/images/men/{{ $product['Other_img4'] }}" alt="" height="100px" width="100px"></td>
            </tr>
            <tr>
                <th>Product Status</th><td>{{ $product['Product_status'] }}</td>
            </tr>
        </table>
    </div>
    </div>
</div>

@endsection