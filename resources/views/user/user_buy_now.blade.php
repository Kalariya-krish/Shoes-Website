@extends('user/master_user')

@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/buy_now.css">
    {{-- <!-- <link rel="stylesheet" href="nav.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <style>
      input[type=number]{
        margin: 10px 0;
        padding: 10px;
        box-sizing: border-box;
        width: 100%;
        font-size: 17px;
        border: 1px solid #aaaaaa;
      }
      textarea{
    margin: 10px 0;
    padding: 10px;
    box-sizing: border-box;
    width: 100%;
    font-size: 17px;
    border: 1px solid #aaaaaa;
  }
    </style>
  </head>
  <body style="background: rgb(161, 206, 220)">
    <form id="myForm" action="{{ URL::to('/') }}/user_place_order/{{ $pro_detail['Pro_id'] }}" method="post">
      <h1 align = center class="text-info">Buy Now</h1>
        @csrf
      <div style="text-align:center;">
        <span class="step" id = "step-1" style="background-color:rgb(22, 70, 85)">1</span>
        <span class="step" id = "step-2" style="background-color:rgb(22, 70, 85)">2</span>
        <span class="step" id = "step-3" style="background-color:rgb(22, 70, 85)">3</span>
        <!-- <span class="step" id = "step-4">4</span> -->
      </div>
      <div class="tab" id = "tab-1">
        <p>Address Details : </p>
        {{-- <textarea name="address" id="" cols="30" rows="3" placeholder="Enter Address"></textarea> --}}
         <input type = "text" placeholder="Enter Address" name="address" value="{{ $registrationData['Address'] }}">
        <!-- <p>City:</p> -->
        <input type = "text" placeholder="Enter City Name" name="city" value="{{ $registrationData['City'] }}">
        <!-- <p>Pin:</p> -->
        <input type = "number" placeholder="Enter PinCode" name="pin" value="{{ $registrationData['Pin_code'] }}">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(1, 2);" style="background-color:rgb(22, 70, 85)">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-2">
        <p>Payment Info : </p>
        <div class="row">
            <div class="col-6">
                Cash On Delivery <input type = "radio" name="payment" value="COD" checked>
            </div>
            <div class="col-6">
                Online Payment <input type = "radio" name="payment" value="Online">
            </div>
        </div>
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(2, 1);" style="background-color:rgb(22, 70, 85)">Previous</div>
          <div class="index-btn" onclick="run(2, 3);" style="background-color:rgb(22, 70, 85)">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-3">
        <p>Summary : </p>
        <div>
          <h5 class="shadow-sm p-3 mb-3 bg-body rounded"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
          <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
          </svg> Estimated Delivery in 6 Days.</h5>
        </div>
        <div class="row">
          <div class="col-4 col-sm-4 col-lg-4 col-md-4 col-xxl-4 col-xl-4 p-2">
            <img src="{{ URL::to('/') }}/images/men/{{ $pro_detail['Pro_img'] }}" class="img-fluid" style="height:150px;width:150px">
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2 mt-2">
            <h3 class="fs-lg-2 fs-sm-5">{{ $pro_detail['Pro_name'] }}</h3>
            <h3 class="fs-lg-2 fs-sm-5">{{ $pro_detail['Pro_price'] }}</h3>
              <div class="col-3">
                <div class="row">
                  <div class="col-2">
                    <h5 class="mt-3">Size: </h5>
                  </div>
                  <div class="col-9 mt-0">
                    <input type="number" class="form-control form-control-sm" min="6" max="10" name="size" value="{{ $cart['Size'] }}" >
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="row">
                  <div class="col-2">
                    <h5 class="mt-3">Qnt: </h5>
                  </div>
                  <div class="col-9 mt-0">
                    <input type="number" class="form-control form-control-sm" min="1" max="5" name="quantity" value="{{ $cart['Quantity'] }}" >
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="index-btn-wrapper">
            <div class="index-btn" onclick="run(3, 2);" style="background-color:rgb(22, 70, 85)">Previous</div>
             <button class="btn btn-info" type="submit" value="Place order">Place Order</button>
          </div>
        </div>
      </div>
    </form>
    <script>
      // Default tab
      $(".tab").css("display", "none");
      $("#tab-1").css("display", "block");
      
      function run(hideTab, showTab){
        if(hideTab < showTab){ // If not press previous button
          // Validation if press next button
          var currentTab = 0;
          x = $('#tab-'+hideTab);
          y = $(x).find("input")
          for (i = 0; i < y.length; i++){
            if (y[i].value == ""){
              $(y[i]).css("background", "#ffdddd");
              $(y[i]).css("border", "1px solid red");
              return false;
            }
          }
        }   
        // Progress bar
        for (i = 1; i < showTab; i++){
          $("#step-"+i).css("opacity", "1");
        }
        // Switch tab
        $("#tab-"+hideTab).css("display", "none");
        $("#tab-"+showTab).css("display", "block");
        $("input").css("background", "#fff");
      }
    </script>
  </body>
</html>

@endsection