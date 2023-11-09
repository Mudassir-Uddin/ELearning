@extends('layout.dashboard')
@section('mydashboard')

{{-- Users --}}

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">USERS :</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Date Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($user as $ct)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $ct->name }}</td>
                                   
                                    <td><img src="{{$ct->img}}" width="80px" height="50px"
                                            class="circle" alt=""></td>
                                   
                                            <td>{{ $ct->email }}</td>
                                            <td>{{ $ct->role==2 ?  "user": "Admin"  }}</td>
                                            <td>{{ $ct->updated_at=date("Y-m-d") }}</td>
                                            <td>
                                        <a href="{{ url('/Usersedit') }}/{{ $ct->id }}"
                                            class="btn btn-warning">Edit</a>
                                        <button onclick="myfun({{ $ct->id }})" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->

<script>
    function myfun(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'

                )
                window.location.href="{{ url('/Usersdelete') }}/"+id
            }
        })
        // if (ans) {
        //     var ans = confirm("Do you want to delete ?")

        // }
    }
</script>
@endsection
