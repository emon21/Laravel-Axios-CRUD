@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="bg-dark px-4">
            <h2 class="text-light text-center mb-4 p-4">Student Information</h2>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <div class="d-flex justify-content-center mb-3">
            <div class="card col-sm-6">
                <div class="card-header bg-success text-light d-flex justify-content-between align-item-center">
                    <h4 class="pt-1"> Create Student </h4>
                    <a href="{{ route('student.index') }}" class="btn btn-light">Back Student</a>
                </div>
                <div class="card-body">
                    <form id="addNewDataForm">
                        <div class="mb-3 mt-3">
                            <label for="studentName" class="form-label">Student Name:</label>
                            <input type="text" class="form-control" id="studentName" placeholder="Enter Student Name">
                            <span id="error" class="text-danger"></span>

                        </div>
                        <div class="d-flex gap-2">
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="studentEmail" class="form-label">Student Email:</label>
                                <input type="email" class="form-control" id="studentEmail" placeholder="Student Email">
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
        </div>
    </div>
@endsection
@push('script')
    <script>
        
       $('body').on('submit', '#addNewDataForm', function(e) {
            e.preventDefault();
            axios.post("{{ route('student.store') }}", {

                studentName: $('#studentName').val(),
                studentEmail: $('#studentEmail').val(),
                studentPhone: $('#studentPhone').val(),

            }).then(function(response) {

               
                $('#studentName').val('');
                $('#studentEmail').val('');
                $('#studentPhone').val('');
                $('#error').text('');
                Swal.fire({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success"
                });
                

            }).catch(function(error) {
                // console.log(error);
                if (error.response.data.errors.studentName) {
                    $('#error').text(error.response.data.errors.studentName[0]);
                }
            });
        });


        document.addEventListener('DOMContentLoaded', function() {

          

            // const getAllData = () => {
            //     axios.get("{{ route('student.index') }}")
            //         .then(response => {
            //             console.log(response.data);
            //         })
            // }
            // getAllData()

        });
    </script>
@endpush
