@extends('layouts.app')
<style>
    .hidden {
        display: none;
    }
</style>
@section('content')
    <div class="container-fluid mt-5">
        <div class="bg-light px-4">
            <h2 class="text-success font-bold text-center mb-4 text-2xl pb-3">Student Information : CRUD With Axios </h2>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <div class="flex">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between bg-light">
                        <h4 class="text-success pt-2">Student List</h4>
                        <a href="{{ route('student.create') }}" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#createModal">Create Student</a>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>#SL No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>

                        {{-- <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> --}}

                        {{-- <ul class="pagination">
                            {{ $students->links() }}
                        </ul> --}}

                    </div>
                    <div class="card-footer">Student List</div>
                </div>
            </div>
            {{-- <div class="col-sm-4">
                <div class="card">
                    <div class="card-header bg-success text-light d-flex justify-content-between align-item-center">
                        <h4 class="pt-1"> Create Student </h4>
                        <a href="{{ route('student.index') }}" class="btn btn-light">Back Student</a>
                    </div>
                    <div class="card-body">
                        <form id="addNewDataForm">
                            <div class="mb-3 mt-3">
                                <label for="studentName" class="form-label">Student Name:</label>
                                <input type="text" class="form-control" id="studentName"
                                    placeholder="Enter Student Name">
                                <span id="error" class="text-danger"></span>

                            </div>
                            <div class="d-flex gap-2">
                                <div class="mb-3 mt-3 col-sm-6">
                                    <label for="studentEmail" class="form-label">Student Email:</label>
                                    <input type="email" class="form-control" id="studentEmail"
                                        placeholder="Student Email">
                                </div>
                                <div class="mb-3 mt-3 col-sm-6">
                                    <label for="studentPhone" class="form-label">Student Phone:</label>
                                    <input type="text" class="form-control" id="studentPhone"
                                        placeholder="Enter Student Phone">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success">Create Student</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection


<!-- Create Modal -->
@include('student.components.create')

<!-- View Modal -->
@include('student.components.view')


<!-- Edit Modal -->
@include('student.components.edit')


@push('script')
    <script>
        let url = window.location.origin;
        // console.log(url);

        function table_data_row(data) {
            var rows = '';
            var i = 0;
            $.each(data, function(key, value) {
                value.id
                rows = rows + '<tr>';
                rows = rows + '<td>' + ++i + '</td>';
                rows = rows + '<td>' + value.studentName + '</td>';
                rows = rows + '<td>' + value.studentEmail + '</td>';
                rows = rows + '<td>' + value.studentPhone + '</td>';
                rows = rows + '<td data-id="' + value.id + '" class="text-center">';

                rows = rows +
                    '<a class="btn btn-sm btn-success text-light" id="viewRow" data-bs-toggle="modal" data-bs-target="#viewModal"  data-id="' +
                    value.id +
                    '" >View</a> ';

                rows = rows + '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="' + value.id +
                    '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> ';

                rows = rows + '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="' + value.id +
                    '" >Delete</a> ';


                rows = rows + '</td>';
                rows = rows + '</tr>';
            });
            $("#tbody").html(rows);
        }
        // All Data Show

        function getAllData() {
            axios.get("{{ route('get-all-data') }}")
                .then(function(res) {
                    table_data_row(res.data)
                    //console.log(res);
                })
        }

        getAllData();



        // Store Data

        $('body').on('submit', '#addNewDataForm', function(e) {
            e.preventDefault();
            axios.post("{{ route('student.store') }}", {

                studentName: $('#studentName').val(),
                studentEmail: $('#studentEmail').val(),
                studentPhone: $('#studentPhone').val(),

            }).then(function(response) {

                // console.log(response);
                getAllData();
                $('#studentName').val('');
                $('#studentEmail').val('');
                $('#studentPhone').val('');
                $('#error').text('');

                Swal.fire({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success",
                    // position: "top-end",
                    showConfirmButton: false,
                    timer: 1500
                });
                //modal close
                $('#createModal').modal('toggle')

            }).catch(function(error) {
                // console.log(error);
                if (error.response.data.errors.studentName) {
                    $('#error').text(error.response.data.errors.studentName[0]);
                }
            });
        });

        // Delete Data
        $('body').on('click', '#deleteRow', function(e) {
            e.preventDefault();
            let id = $(this).data('id')
            let del = url + '/student/' + id

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(del).then(function(r) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        getAllData();
                    });
                }
            });

        });


        //  Edit Data
        $('body').on('click', '#editRow', function() {
            let id = $(this).data('id');
            let edit = url + '/student/' + id + '/edit'
            // console.log(id);
            axios.get(edit)
                .then(function(res) {
                    console.log(res);
                    $('#eid').val(res.data.id)
                    $('#editName').val(res.data.studentName)
                    $('#editEmail').val(res.data.studentEmail)
                    $('#editPhone').val(res.data.studentPhone)
                })
        })

        // Update
        $('body').on('submit', '#editDataForm', function(e) {
            e.preventDefault()
            let id = $('#eid').val()
            // console.log(id);

            let data = {
                id: id,
                studentName: $('#editName').val(),
                studentEmail: $('#editEmail').val(),
                studentPhone: $('#editPhone').val(),

            }
            let path = url + '/student' + '/' + id

            // console.log(path);

            axios.put(path, data)
                .then(function(res) {
                    getAllData();
                    $('#editModal').modal('toggle')
                    Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: 'Data Update Successfully!',
                    })
                    // console.log(res);
                })
        })

        // viewData
        $('body').on('click', '#viewRow', function() {
            let id = $(this).data('id');
            let view = url + '/student' + '/' + id
            axios.get(view)
                .then(function(res) {
                    // console.log(res);
                    $('#viewName').val(res.data.studentName)
                    $('#viewEmail').val(res.data.studentEmail)
                    $('#viewPhone').val(res.data.studentPhone)
                })
        })
    </script>
@endpush
