@extends('layout.dashboard')
@section('mydashboard')
<div class="container-fluid position-relative d-flex p-0">

    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Tech Giants</h3>
                        </a>
                        <h3>Products Edit</h3>
                    </div>
                    <form action="{{ url('/Tutorialsupdate') }}/{{ $st->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ $st->name }}"
                                name="name" placeholder="jhondoe">
                            <label for="floatingText">Tutorial Name</label>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formFileLg" class="form-label">Image</label>
                            <input class="form-control  form-control bg-dark" name="img" id="formFileLg"
                                type="file">
                            @error('img')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <br>
                            @if ($st->img != null)
                                Old Image : <img src="{{url($st->img)}}" class="img-fluid rounded" width="80px" height="50px" />
                            @endif
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" value="{{ $st->Description }}"
                                name="Description" placeholder="jhondoe">
                            <label for="floatingText">Description</label>
                            @error('Description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">eidt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Services insert End -->
</div>
@endsection