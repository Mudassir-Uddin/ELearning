@extends('layout.dashboard')
@section('mydashboard')

<div class="container-fluid position-relative d-flex p-0">

    <!-- SubServices insert Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-around mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>TG</h3>
                        </a>
                        <h3>Teachers Insert</h3>
                    </div>
                    <form action="{{ url('/TeachersStore') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ old('name') }}"  
                                name="name" placeholder="jhondoe">
                            <label for="floatingText">Teacher Name</label>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="formFileLg" class="form-label">Image</label>
                            <input class="form-control form-control-lg bg-dark" name="Img" id="formFileLg"
                                type="file">

                            @error('Img')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ old('desc') }}"  
                                name="desc" placeholder="jhondoe">
                            <label for="floatingText">Description</label>
                            @error('desc')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        
                        <select name="Course_ID" id="" class="form-select mb-3">
                            @foreach ($Service as $sr)
                                <option value="{{$sr->id}}">{{$sr->Name}}</option>
                            @endforeach
                        </select>
                        
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- SubServices insert End -->
</div>

@endsection
