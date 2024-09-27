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
                        <h4 class="mb-4">Add Slider</h4>
                    </div>
                    <div class="col-lg-2 col-12"></div>
                </div>
                <div class="row">
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-9 col-12">
                        <form class="custom-form contact-form" action="{{ URL::to('/admin') }}/slider_insert" method="post" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-lg-12 col-12">
                                            {{-- <label for="last-name">Choose image</label> --}}
                                            <input type="file" name="slider_img" class="form-control"
                                                value="{{ old('slider_img') }}">
                                                <span style="font-size: 12px; color:red">
                                                    @error('slider_img')
                                                        <div>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </span>
                                        </div>
                                    </div>
                                </div>
    
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <button type="submit" class="form-control">Add</button>
                                    </div><br><br>
                        </form>
                    </div>
                    <div class="col-lg-2 col-12"></div>
                </div>
            </div>
    @endsection
</body>

</html>
