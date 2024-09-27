<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <title>The Brand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    @extends('admin/master_admin')
    @section('content')
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-9 col-12">
                        <h4 class="mb-4">Add Product</h4>
                    </div>
                    <div class="col-lg-2 col-12"></div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    
                    <form class="custom-form contact-form" action="{{ URL::to('/admin') }}/product_insert" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-10 col-12">
                                <div class="row"  style="margin-bottom:20px;">
                                        <div class="col-lg-6 col-12">
                                            <label for="last-name">Product name</label>
                                            <input type="text" name="product_name" class="form-control"
                                                value="{{ old('product_name') }}">
                                                <span style="font-size: 12px; color:red">
                                                    @error('product_name')
                                                        <div>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </span>
                                        </div>
    
                                        <div class="col-lg-6 col-12">
                                            <label for="last-name">Product type</label>
                                            <input type="text" name="product_type" class="form-control"
                                                value="{{ old('product_type') }}">
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
                                        value="{{ old('gender') }}">
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
                                        value="{{ old('product_price') }}">
                                        <span style="font-size: 12px; color:red">
                                            @error('product_price')
                                                <div>{{ $message }}
                                                </div>
                                            @enderror
                                        </span>
                                </div>
                            </div>



                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Color</label>
                                        <input type="text" name="color" class="form-control"
                                            value="{{ old('color') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('color')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Product image</label>
                                        <input type="file" name="pro_img" class="form-control"
                                            value="{{ old('pro_img') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('pro_img')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col">
                                        <label for="last-name">Available size6</label>
                                        <input type="text" name="ava_size_6" class="form-control"
                                            value="{{ old('ava_size_6') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ava_size_6')
                                                    <div style="margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="col">
                                        <label for="last-name">Available size7</label>
                                        <input type="text" name="ava_size_7" class="form-control"
                                            value="{{ old('ava_size_7') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ava_size_7')
                                                    <div style="margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col">
                                        <label for="last-name">Available size8</label>
                                        <input type="text" name="ava_size_8" class="form-control"
                                            value="{{ old('ava_size_8') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ava_size_8')
                                                    <div style="margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                    <div class="col">
                                        <label for="last-name">Available size9</label>
                                        <input type="text" name="ava_size_9" class="form-control"
                                            value="{{ old('ava_size_9') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('ava_size_9')
                                                    <div style="margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Other image1</label>
                                        <input type="file" name="other_img1" class="form-control"
                                            value="{{ old('other_img1') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('other_img1')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Other image2</label>
                                        <input type="file" name="other_img2" class="form-control"
                                            value="{{ old('other_img2') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('other_img2')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom:20px;">
                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Other image3</label>
                                        <input type="file" name="other_img3" class="form-control"
                                            value="{{ old('other_img3') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('other_img3')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <label for="last-name">Other image4</label>
                                        <input type="file" name="other_img4" class="form-control"
                                            value="{{ old('other_img4') }}">
                                            <span style="font-size: 12px; color:red">
                                                @error('other_img4')
                                                    <div>{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-4 col-6">
                                    <button type="submit" class="form-control">Update</button>
                                </div><br><br>
                            </div>
                        </div>
                    </form>
                    <div class="col"></div>
                </div>
            </div>
    @endsection
</body>

</html>
