@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="bg-dark px-4">
            <h2 class="text-light text-center mb-4 p-4">Student Information</h2>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <div class="card col-sm-6">
                <div class="card-header bg-success text-light d-flex justify-content-between align-item-center">
                    <h4 class="pt-1"> Edit Student </h4>
                    <a href="{{ route('student.index') }}" class="btn btn-light">Back Student</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.update',$student) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mt-3">
                            <label for="studentName" class="form-label">Student Name:</label>
                            <input type="text" class="form-control" id="studentName" placeholder="Enter Student Name"
                                name="studentName" value="{{ old('studentName',$student->studentName) }}">
                            @error('studentName')
                                <div class="error">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="d-flex gap-2">
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="studentEmail" class="form-label">Student Email:</label>
                                <input type="text" class="form-control" id="studentEmail" placeholder="Student Email"
                                    name="studentEmail" value="{{ old('studentEmail',$student->studentEmail) }}">
                                @error('studentEmail')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3 col-sm-6">
                                <label for="studentPhone" class="form-label">Student Phone:</label>
                                <input type="text" class="form-control @error('studentPhone') error @enderror"
                                    id="studentPhone" placeholder="Enter Student Phone" name="studentPhone"
                                    value="{{ old('studentPhone',$student->studentPhone) }}">
                                @error('studentPhone')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="studentAddress" class="form-label">Student Address:</label>
                            <textarea name="studentAddress" class="form-control" id="studentAddress" placeholder="Address..." id="studentAddress"
                                cols="10" rows="5" value="{{ old('studentAddress') }}">{{ old('studentAddress',$student->studentAddress) }}</textarea>

                            @error('studentAddress')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="studentImage" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="studentImage" placeholder="studentImage"
                                name="studentImage">
                            @error('studentImage')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <img src="{{ $student->studentImage }}" alt="" width="120" height="80">
                        <button type="submit" class="btn btn-outline-success">Update Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        // axios.get("{{ route('student.index') }}")
        //     .then(response => {
        //         console.log(response.data);
        //     })

        document.addEventListener('DOMContentLoaded', function() {

            axios.get("{{ route('student.index') }}")
                .then(response => {
                    console.log(response.data)
                });

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
