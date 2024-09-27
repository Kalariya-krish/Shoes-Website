<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Brand</title>
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
                        <h4 class="mb-4">Edit Profile</h4>
                    </div>
                    <div class="col-lg-2 col-12"></div>
                </div>
                <div class="row">
                    <form class="custom-form contact-form" action="{{ URl::to('/admin') }}/admin_update" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <label for="fileToUpload">
                                    <div class="profile-pic"
                                        style="background-image: url({{ URL::to('/') }}/images/admin/{{ $data['Profile_picture'] }});">
                                        <span class="glyphicon glyphicon-camera"></span>
                                        {{-- <span>Change Image</span> --}}
                                    </div>
                                </label>
                                <input type="File" name="profile_picture" id="fileToUpload">
                                <span style="font-size: 12px; color:red;">
                                    @error('profile_picture')
                                        <div style="">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>

                            <div class="col-lg-8 col-12">
                                <div class="row"  style="margin-bottom:20px;">
                                        <div class="col-lg-6 col-12">
                                            <label for="last-name">Email</label>
                                            <input type="text" name="first_name" class="form-control"
                                                value="{{ old('email') ?: $data['Email'] }}" readonly>
                                                <span style="font-size: 12px; color:red">
                                                    @error('email')
                                                        <div>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </span>
                                        </div>
    
                                        <div class="col-lg-6 col-12">
                                            <label for="last-name">Password</label>
                                            <input type="text" name="password" class="form-control"
                                                value="{{ old('password') ?: $data['Password'] }}" readonly>
                                                <span style="font-size: 12px; color:red">
                                                    @error('password')
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
                </div>
            </div>
        </section>
    @endsection
</body>

</html>
