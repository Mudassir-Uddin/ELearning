@extends('Layout.form')
@section('myform')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <div class="container-fluid position-relative d-flex p-0">

        <!-- User insert Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-10 col-md-7 col-lg-7 col-xl-7">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-around mb-3">
                            <a href="index.html" class="">
                                <h3 style="color:#6aaff0;"><i class="fa fa-user-edit me-2"></i>Tech Giants</h3>
                            </a>
                            <h3>Create an Account</h3>
                        </div>
                        <form action="{{ url('/registerstore') }}" method="POST" enctype="multipart/form-data" id="loginForm">

                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" name="name"
                                    value="{{ old('name') }}" placeholder="Name">
                                <label for="floatingText">Name</label>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    id="floatingText" placeholder="Email">
                                <label for="floatingText">Email</label>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="pass" id="floatingText" class="form-control"
                                    value="{{ old('pass') }}" placeholder="Password">
                                <label for="floatingText">Password</label>
                                @error('pass')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" style="background-color:#6aaff0; border-color:#6aaff0;" class="btn btn-primary py-3 w-100 mb-4 fs-5">Register</button>
                            <a href="{{url('/login')}}"  style="color:#6aaff0;">Already have an account? Login :)</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- User insert End -->
    </div>

@endsection

