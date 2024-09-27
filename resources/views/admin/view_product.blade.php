<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Metas -->
    <title>Kids</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>The Brand</title>
    <!-- Zoom product -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/css/magnify.css" rel="stylesheet">
    <!-- Font awasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    @extends('master')
    @section('content')
        <!-- view product -->
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-success" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <div class="container">
            <div class="row" style="margin-top:-10px;">
                {{-- <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show">
                    <h6 class="text-center text-success">
                        <!-- <button class="btn-close btn-outline-danger" type="button" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show">
                    <h6 class="text-center text-danger">
                        <!-- <button class="btn-close btn-outline-danger" type="button" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    </h6>
                </div>
            </div>
        </div> --}}
                <!-- product img -->
                <div class="col-sm-12 col-lg-6 col-md-6 col-12 col-xxl-6">
                    <!-- product view  -->
                    <div class="border border-2 text-center">
                        <!-- main product  -->
                        <figure>
                            <img src="{{ URL::to('/') }}/images/men/{{ $data['Pro_img'] }}" alt="card"
                                class="img-fluid p-2" style="height:600px;">
                        </figure>
                        <hr>
                        <div class="p-0 m-0" style="display: flex;flex-direction: row;">
                            <a href="{{ URL::to('/') }}/images/men/{{ $data['Other_img1'] }}" class="p-0 m-0">
                                <img alt="" class="zoom"
                                    src="{{ URL::to('/') }}/images/men/{{ $data['Other_img1'] }}" style="width:80%">
                            </a>
                            <a href="{{ URL::to('/') }}/images/men/{{ $data['Other_img2'] }}" class="p-0 m-0">
                                <img alt="" class="zoom"
                                    src="{{ URL::to('/') }}/images/men/{{ $data['Other_img2'] }}" style="width:80%">
                            </a>
                            <a href="{{ URL::to('/') }}/images/men/{{ $data['Other_img3'] }}" class="p-0 m-0">
                                <img alt="" class="zoom"
                                    src="{{ URL::to('/') }}/images/men/{{ $data['Other_img3'] }}" style="width:80%">
                            </a>
                            <a href="{{ URL::to('/') }}/images/men/{{ $data['Other_img4'] }}" class="p-0 m-0">
                                <img alt="" class="zoom"
                                    src="{{ URL::to('/') }}/images/men/{{ $data['Other_img4'] }}" style="width:80%">
                            </a>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('.zoom').magnify();
                            });
                        </script>

                        <!-- 2 buttons -->

                    </div>
                </div>
                <!-- product details  -->
                <div class="col-sm-12 col-lg-6 col-md-6 col-12 col-xxl-6 border border-2 p-2">
                    <!-- productname -->
                    <div class="p-2">
                        <h1 class="fw-lighter fw-bolder text-danger">Male</h1>
                        <h2 class="text-info">Special price</h2>
                    </div>
                    <!-- product-price  -->
                    <div class="ms-2">
                        &nbsp;&nbsp;&nbsp;<h4 class="d-inline text-dark">Rs.</h4>
                        <h5 class=" d-inline text-dark">{{ $data['Pro_price'] }}</h5>
                    </div>
                    <!-- color  -->
                    <div class="p-2">

                    </div>
                    <!-- size -->
                    <div class="p-2">
                        <form action="{{ URL::to('/') }}/view_product" method="get">
                            <select name="size" class="btn btn-info" style="width:100px;">
                                <option value="size6">6</option>
                                <option value="size7">7</option>
                                <option value="size8">8</option>
                                <option value="size9">9</option>
                            </select>
                        </form>
                    </div>
                    <div class="row" style="justify-content:center; align-items:center; padding:30px 10px;">
                        <div class="col-4">
                            <a href="{{ URl::to('/') }}/add_to_cart/{{ $data['Pro_id'] }}"><button
                                    class="btn btn-outline-info" type="submit" name="atc">ADD TO CARD</button></a>
                        </div>
                        <div class="col-4">
                            <a href="{{ URL::to('/') }}/buy_now/{{ $data['Pro_id'] }}"><button
                                    class="btn btn-outline-dark" type="submit" name="atc">BUY NOW</button></a>
                        </div>
                    </div>

                    <div class="p-2">
                        <p class="text-wrap text-success h5">Free Delivery</p>
                    </div>
                    <!-- details -->
                    <div class="accordion p-2">
                        <details class="shadow p-3 mb-3 bg-body rounded text-danger">
                            <summary>
                                ABOUT PRODUCT
                            </summary>
                            <p class="fs-5 fw-normal">
                            <ul>
                                <li>
                                    Name : {{ $data['Pro_name'] }}
                                </li>

                                <li>
                                    Brand : Brogan
                                </li>
                                <li>
                                    Quantity : 1-pair
                                </li>
                                <li>
                                    Color : {{ $data['Color'] }}
                                </li>
                                <li>
                                    Marketed By
                                    : Brogan India Limited, 27 B, Camac Street, First Floor, Rajkot, 360005, Gujarat.
                                </li>
                            </ul>
                            </p>
                        </details>
                        <details class="shadow p-3 mb-3 bg-body rounded text-danger">
                            <summary>
                                DELIVARY AND RETURNS
                            </summary>
                            <p class="">
                            <h5 class="">DELIVARY</h5>
                            <hr>
                            <ul>
                                <li>
                                    We aim to deliver the products to you in 5 to 7 business days.
                                </li>
                                <li>
                                    The Brogan online store provides free home delivery to your doorstep.
                                </li>
                                <li>
                                    Our Cash on Delivery option allows you to pay the order value at the time of delivery
                                    for all your orders.
                                </li>
                            </ul>

                            <h5>RETURN</h5>
                            <hr>
                            <ul>
                                <li>
                                    The Brogan return policy allows you to return items purchased on our online store within
                                    30 days from the date of purchase.
                                </li>

                                <li>
                                    Return request can be raised at Brogan customer care on 1800 419 2282 or email us at
                                    brogan@gmail.com for further queries.
                                </li>

                                <li>
                                    Once the return is requested, we will arrange a free pick-up from the delivery address.
                                </li>
                                <li>
                                    You are welcome to try on the product but do take adequate measures to preserve its
                                    original condition.
                                </li>
                            </ul>
                            </p>
                        </details>
                    </div>

                    <!-- .  -->
                    <!-- product review and rating  -->
                    <!-- end title  -->
                    <div class="text-center">
                        <div class="d-inline text-danger fst-italic fw-bolder fs-3">Brogan</div>
                        <div class="d-inline fw-lighter">Best quality products from trusted suppliers</div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
</body>

</html>
