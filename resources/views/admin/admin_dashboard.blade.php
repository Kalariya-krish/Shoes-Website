<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Brand</title>
    
</head>

<body>
    @extends('admin/master_admin');
    @section('content')
        <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Registered Users</div>
                            <div class="card-body">
                              <h2>{{ $arr['t_user'] }}</h2>
                            </div>
                          </div>       
                    </div>
                    <div class="col">
                        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                            <div class="card-header">Active Users</div>
                            <div class="card-body">
                              <h2>{{ $arr['a_user'] }}</h2>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Inactive User</div>
                            <div class="card-body">
                              <h2>{{ $arr['i_user'] }}</h2>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Total Products</div>
                            <div class="card-body">
                              <h2>{{ $arr['t_products'] }}</h2>
                            </div>
                          </div>       
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Total Orders</div>
                            <div class="card-body">
                              <h2>{{ $arr['t_orders'] }}</h2>
                            </div>
                          </div>
                    </div>
                    <div class="col"></div>
                </div>
        </div>
    @endsection
</body>

</html>
