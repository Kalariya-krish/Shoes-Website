<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <title>The Brand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/change_pp.css">
    <script>
        var loadFile = function(event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</head>

<body>
    @extends('admin/master_admin')
    @section('content')
    <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-9 col-12">
                        <h4 class="mb-4">Edit Product</h4>
                    </div>
                    <div class="col-lg-2 col-12"></div>
                </div>
                <div class="row">
                    <form class="custom-form contact-form" action="{{ URl::to('/admin') }}/product_update" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <label for="fileToUpload">
                                    <div class="profile-pic"
                                        style="background-image: url({{ URL::to('/') }}/images/men/{{ $data['Pro_img'] }});">
                                        <span class="glyphicon glyphicon-camera"></span>
                                        {{-- <span>Change Image</span> --}}
                                    </div>
                                </label>
                                <input type="File" name="pro_img" id="fileToUpload">
                                <span style="font-size: 12px; color:red;">
                                    @error('pro_img')
                                        <div style="">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>

                            <div class="col-lg-8 col-12">
                                <div class="row"  style="margin-bottom:20px;">
                                    <div class="col-lg-2 col-12">
                                        <label for="last-name">Id</label>
                                        <input type="text" name="product_id" class="form-control"
                                            value="{{  $data['Pro_id'] }}" readonly>
                                            <span style="font-size: 12px; color:red">
                                                @error('product_id')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                        <div class="col-lg-4 col-12">
                                            <label for="last-name">Product name</label>
                                            <input type="text" name="product_name" class="form-control"
                                                value="{{ old('product_name') ?: $data['Pro_name'] }}">
                                                <span style="font-size: 12px; color:red">
                                                    @error('product_name')
                                                        <div>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </span>
                                        </div>
    
                                        <div class="col-lg-6 col-12">
                                            <label for="last-name">Product Type</label>
                                            <input type="text" name="product_type" class="form-control"
                                                value="{{ old('product_type') ?: $data['Pro_type'] }}">
                                                <span style="font-size: 12px; color:red">
                                                    @error('product_type')
                                                        <div>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </span>
                                        </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                <div class="col">
                                    <label for="last-name">Gender</label>
                                    <input type="text" name="gender" class="form-control"
                                        value="{{ old('gender') ?: $data['Gender'] }}" readonly>
                                        <span style="font-size: 12px; color:red">
                                            @error('gender')
                                                <div>{{ $message }}
                                                </div>
                                            @enderror
                                        </span>
                                </div>
                                <div class="col">
                                    <label for="last-name">Product Price</label>
                                    <input type="text" name="product_price" class="form-control"
                                        value="{{ old('product_price') ?: $data['Pro_price'] }}">
                                        <span style="font-size: 12px; color:red">
                                            @error('product_price')
                                                <div>{{ $message }}
                                                </div>
                                            @enderror
                                        </span>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="last-name">Color</label>
                                    <input type="text" name="color" class="form-control"
                                        value="{{ old('color') ?: $data['Color'] }}">
                                        <span style="font-size: 12px; color:red">
                                            @error('color')
                                                <div>{{ $message }}
                                                </div>
                                            @enderror
                                        </span>
                                </div>
                            </div>

                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Available Size-6</label>
                                        <input type="text" name="ava_size_6" class="form-control"
                                            value="{{ old('ava_size_6') ?: $data['Ava_size_6'] }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ava_size_6')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Available size-7</label>
                                        <input type="text" name="ava_size_7" class="form-control"
                                            value="{{ old('ava_size_7') ?: $data['Ava_size_7'] }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ava_size_7')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col">
                                        <label for="last-name">Available size-8</label>
                                        <input type="text" name="ava_size_8" class="form-control"
                                            value="{{ old('ava_size_8') ?: $data['Ava_size_8'] }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ava_size_8')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Available size-9</label>
                                        <input type="text" name="ava_size_9" class="form-control"
                                            value="{{ old('ava_size_9') ?: $data['Ava_size_9'] }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ava_size_9')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>


                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-lg-3 col-12">
                                        <div class="profile-pic"
                                        style="background-image: url({{ URL::to('/') }}/images/men/{{ $data['Other_img1'] }}); height:70px; width:70px;">
                                        <span class="glyphicon glyphicon-camera"></span>
                                        {{-- <span>Change Image</span> --}}
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="profile-pic"
                                        style="background-image: url({{ URL::to('/') }}/images/men/{{ $data['Other_img2'] }}); height:70px; width:70px;">
                                        <span class="glyphicon glyphicon-camera"></span>
                                        {{-- <span>Change Image</span> --}}
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="profile-pic"
                                                style="background-image: url({{ URL::to('/') }}/images/men/{{ $data['Other_img3'] }}); height:70px; width:70px;">
                                                <span class="glyphicon glyphicon-camera"></span>
                                                {{-- <span>Change Image</span> --}}
                                            </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="profile-pic"
                                        style="background-image: url({{ URL::to('/') }}/images/men/{{ $data['Other_img4'] }}); height:70px; width:70px;">
                                        <span class="glyphicon glyphicon-camera"></span>
                                        {{-- <span>Change Image</span> --}}
                                    </div>
                                    </div>

                                <div class="col-lg-3 col-md-4 col-6">
                                    <button type="submit" class="form-control">Update</button>
                                </div><br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection
</body>

</html>
