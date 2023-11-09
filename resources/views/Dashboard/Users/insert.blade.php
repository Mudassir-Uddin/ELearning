@extends('layout.dashboard')
@section('mydashboard')

<div class="container-fluid position-relative d-flex p-0">

    <!-- User insert Start -->
    
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-around mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>TECH GIANTS</h3>
                        </a>
                        <h3>User Insert</h3>
                    </div>
                    <form action="{{ url('/UsersStore') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ old('name') }}"  
                                name="name" placeholder="jhondoe">
                            <label for="floatingText">User name</label>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="formFileLg" class="form-label">Users Image</label>
                            <input class="form-control form-control-lg bg-dark" name="img" id="formFileLg"
                                type="file">

                            {{-- @error('img')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ old('email') }}"  
                                name="email" placeholder="jhondoe">
                            <label for="floatingText">Email</label>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ old('password') }}"  
                                name="password" placeholder="jhondoe">
                            <label for="floatingText">Password</label>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        
                        <select name="role" id="" class="form-select mb-3">
                            {{-- @foreach ($Service as $sr) --}}
                                <option value="2">User</option>
                                <option value="1">Admin</option>
                            {{-- @endforeach --}}
                        </select>
                        
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- User insert End -->
</div>
@endsection