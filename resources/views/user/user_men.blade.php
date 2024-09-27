<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Metas -->
    <title>The Brand</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

<body>
    @extends('user/master_user')
    @section('content')
    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-sm-12">
                    
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-all text-center">
                                <h1>MEN SHOES</h1>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row special-list">
                        @foreach ($data as $all)
                            <div class="col-lg-3 col-md-6 special-grid top-featured">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <div class="type-lb">
                                            <p class="sale">Sale</p>
                                        </div>
                                        <img src="{{ URL::to('/') }}/images/men/{{ $all['Pro_img'] }}" class="img-fluid" alt="Image">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="{{ URL::to('/') }}/user_view_product/{{ $all['Pro_id'] }}" data-toggle="tooltip" data-placement="right" title="View Product"><i class="fas fa-eye"></i></a></li>
                                                <li><a href="{{ URL::to('/') }}/user_buy_now/{{ $all['Pro_id'] }}" data-toggle="tooltip" data-placement="right" title="Buy now"><i class="fas fa-cart-arrow-down"></i></a></li>
                                                <li><a href="{{ URL::to('/') }}/user_add_to_wishlist/{{ $all['Pro_id'] }}" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                            <a class="cart" href="{{ URL::to('/') }}/user_add_to_cart/{{ $all['Pro_id'] }}">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="why-text">
                                        <h4>{{ $all['Pro_name'] }}</h4>
                                        <h5>Rs. {{ $all['Pro_price'] }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    @endsection
</body>

</html>