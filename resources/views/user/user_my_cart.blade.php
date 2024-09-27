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
        @if(session('remove_success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session('remove_success') }}
            </div>
        @endif
        @if(session('remove_error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{ session('remove_error') }}
        </div>
        @endif
        @if(session('order_success'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{ session('remove_success') }}
            </div>
        @endif

        <div class="cart-container">
            <h3>Your Cart</h3>
            <table>
                <tr>
                    <th colspan="2">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php $totalprice=0; ?>
                @foreach ($data as $d)
                <tr>

                    <td><img src="{{ URL::to('/') }}/images/men/{{ $d->Pro_img }}" alt="" height="100px" width="100px"></td>
                    <td>{{ $d->Pro_name }}</td>
                    <td id="iprice">Rs.{{ $d->Pro_price }}</td>
                    <td class="item-quantity">
                        <a href="{{ URL::to('/') }}/decrement_quantity/{{ $d->Pro_id }}"><button class="decrement btn btn-outline-dark">-</button></a>
                        <input class="quantity" type="text" value="{{ $d->Quantity }}" max="5" min="1" readonly>
                        <a href="{{ URL::to('/') }}/increment_quantity/{{ $d->Pro_id }}"><button class="increment btn btn-outline-dark">+</button></a>
                    </td>
                    <?php 
                    $totalperquantity=0;
                     for($i=1;$i<=$d->Quantity;$i++){
                                    $totalperquantity = $totalperquantity+$d->Pro_price;
                                }  
                    ?>
                    <td>Rs.<?php echo $totalperquantity;?></td>
                    {{-- <td class="item-total">Rs.{{ $d->Pro_price }}</td> --}}
                    <td>
                        <a href="{{ URL::to('/') }}/user_buy_now/{{ $d->Pro_id }}"><button class="remove btn btn-info">Buy now</button></a>
                        <a href="{{ URL::to('/') }}/user_remove_from_cart/{{ $d->Pro_id }}"><button class="remove btn btn-danger">Remove</button></a>
                    </td>
                    <?php $totalprice=$totalprice+$totalperquantity ?>
                </tr>
                @endforeach
                
                <!-- Add more rows for additional items -->
                <tr class="total">
                    <td colspan="4">Total:</td>
                    <td id="cart-total" colspan="1"><?php echo "Rs. ".$totalprice;?></td>
                </tr>
            </table>
            
        </div>
        {{-- <script>
                var gt=0;
                var iprice = document.getElementsByClassName('iprice');
                var iquantity = document.getElementsByClassName('iquantity');
                var itotal = document.getElementsByClassName('itotal');
                var gtotal = document.getElementById('gtotal');
                gt=0;
                for(i=0;i<iprice.length;i++)
                {
                    itotal[i].innerHTML=(iprice[i].value)*(iquantity[i].value);
                    gt = gt + (iprice[i].value)*(iquantity[i].value);
                }
                gtotal.innerHTML="Rs. "+gt;
                document.getElementById('items').innerHTML=(iprice.length);
        </script>
        <script>
        
            const items = document.querySelectorAll('.item-quantity');
    
            items.forEach(item => {
                const dec = item.querySelector('.decrement');
                const inc = item.querySelector('.increment');
                const quantityInput = item.querySelector('.quantity');
                const itemTotal = item.nextElementSibling;
    
                let price = parseFloat(itemTotal.textContent.replace('$', ''));
                let quantity = parseInt(quantityInput.value);
                
                dec.addEventListener('click', () => {
                    if (quantity > 1) {
                        quantity--;
                        quantityInput.value = quantity;
                        updateTotal();
                    }
                });
    
                inc.addEventListener('click', () => {
                    quantity++;
                    quantityInput.value = quantity;
                    updateTotal();
                });
    
                function updateTotal() {
                    const total = (price * quantity).toFixed(2);
                    itemTotal.textContent =  total;
                    updateCartTotal();
                }
    
                function updateCartTotal() {
                    const cartTotalElement = document.getElementById('cart-total');
                    let cartTotal = 0;
    
                    items.forEach(item => {
                        const total = parseFloat(item.nextElementSibling.textContent.replace('$', ''));
                        cartTotal += total;
                    });
    
                    cartTotalElement.textContent = '$' + cartTotal.toFixed(2);
                }
            });
    
            const removeButtons = document.querySelectorAll('.remove');
    
            removeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const row = button.parentElement.parentElement;
                    row.remove();
                    updateCartTotal();
                });
            });
        </script> --}}
    @endsection
</body>

</html>
