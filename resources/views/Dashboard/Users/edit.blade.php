@extends('layout.dashboard')
@section('mydashboard')

    <!-- User Edit Start -->
    <div class="container-fluid position-relative d-flex p-0">

        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Tech Giants</h3>
                            </a>
                            <h3>User Edit</h3>
                        </div>
                        <form action="{{ url('/Usersupdate') }}/{{ $user->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" value="{{ $user->name }}"
                                    name="name" placeholder="jhondoe">
                                <label for="floatingText">username</label>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="formFileLg" class="form-label">User Image</label>
                                <input class="form-control  form-control bg-dark" name="img" id="formFileLg"
                                    type="file">
                                @error('img')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <br>
                                @if ($user->img != null)
                                    Old Image : <img src="{{url($user->img)}}" class="img-fluid rounded" width="80px" height="50px" />
                                @endif
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" value="{{ $user->email }}"
                                    name="email" placeholder="jhondoe">
                                <label for="floatingText">email</label>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="TEXT" class="form-control" id="floatingText" value="{{ $user->password }}"
                                    name="password" placeholder="jhondoe">
                                <label for="floatingText">password</label>
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

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">eidt</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- User insert End -->
    </div>
@endsection