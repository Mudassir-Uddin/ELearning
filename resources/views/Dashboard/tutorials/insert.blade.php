@extends('layout.dashboard')
@section('mydashboard')

<div class="container-fluid position-relative d-flex p-0">

    <!-- Product insert Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-around mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>TG</h3>
                        </a>
                        <h3>Tutorials Insert</h3>
                    </div>
                    <form action="{{ url('/TutorialsStore') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ old('name') }}"  
                                name="name" placeholder="jhondoe">
                            <label for="floatingText">Name</label>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="formFileLg" class="form-label">Image</label>
                            <input class="form-control form-control-lg bg-dark" name="img" id="formFileLg"
                                type="file">

                            @error('img')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ old('Description') }}"  
                                name="Description" placeholder="jhondoe">
                            <label for="floatingText">Description</label>
                            @error('Description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <select name="Teacher_ID" id="" class="form-select mb-3">
                            @foreach ($teacher as $sr)
                                <option value="{{$sr->id}}">{{$sr->name}}</option>
                            @endforeach
                        </select>
                        
                        {{-- <select name="Fk_SubServices" id="" class="form-select mb-3">
                            @foreach ($SubService as $sr)
                                <option value="{{$sr->id}}">{{$sr->name}}</option>
                            @endforeach
                        </select> --}}

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Insert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Product insert End -->
</div>

@endsection
