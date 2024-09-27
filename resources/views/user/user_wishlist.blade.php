<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Brand</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .cart-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h3{
            color: black;
            border-bottom: 2px solid #4CAF50;
        }
        h3:hover{
            color: #4CAF50;
            border-bottom: 2px solid black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .item-actions {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity {
            width: 40px;
            text-align: center;
        }
        .total {
            font-weight: bold;
        }
        .buy-button {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
    </style>
    
</head>

<body>
    @extends('user/master_user')
    @section('content')
        
    @if(session('already_in_wishlist'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('already_in_wishlist') }}
                            </div>
                            @endif
    
        <div class="cart-container">
            <h3>My Wishlist</h3>
            <table>
                <tr>
                    <th colspan="2">Product</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $d)
                <tr>

                    <td><img src="{{ URL::to('/') }}/images/men/{{ $d->Pro_img }}" alt="" height="100px" width="100px"></td>
                    <td>{{ $d->Pro_name }}</td>
                    <td id="iprice">Rs.{{ $d->Pro_price }}</td>
                    
                    <td>
                        {{-- <a href="{{ URL::to('/') }}/user_buy_now/{{ $d->Pro_id }}"><button class="remove btn btn-info">Buy now</button></a> --}}
                        <a href="{{ URL::to('/') }}/user_remove_to_wishlist/{{ $d->Pro_id }}"><button class="remove btn btn-danger">Remove</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
            
        </div>
    @endsection
</body>

</html>
