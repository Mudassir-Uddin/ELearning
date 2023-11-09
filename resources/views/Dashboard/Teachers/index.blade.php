@extends('layout.dashboard')
@section('mydashboard')

 <!-- Table Start -->
 <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">Teachers Table :</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Course</th>
                                <th scope="col">Date Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($teacher as $ct)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $ct->name }}</td>
                                   
                                    <td><img src="{{ $ct->Img }}" width="80px" height="50px"
                                            class="rounded" alt=""></td>
                                            {{-- <td>{{ $ct->Course_ID }}</td> --}}
                                            <td>
                                                @if ($ct->courses) 
                                                    {{ $ct->courses->Name }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $ct->updated_at=date("Y-m-d") }}</td>
                                            <td>
                                        <a href="{{ url('/Teachersedit') }}/{{ $ct->id }}"
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
                window.location.href="{{ url('/Teachersdelete') }}/"+id
            }
        })
        // if (ans) {
        //     var ans = confirm("Do you want to delete ?")

        // }
    }
</script>
@endsection