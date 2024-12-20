<!-- Edit Modal -->
{{-- @include('student.components.edit') --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Student</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <button type="button" class="btn btn-close  btn-danger" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editDataForm">
                    <input type="hidden" id="eid">
                    <div class="mb-3 mt-3">
                        <label for="editName" class="form-label">Student Name:</label>
                        <input type="text" class="form-control" id="editName" placeholder="Student Name">
                        <span id="error" class="text-danger"></span>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="mb-3 mt-3 col-sm-6">
                            <label for="editEmail" class="form-label">Student Email:</label>
                            <input type="email" class="form-control" id="editEmail" placeholder="Student Email">
                        </div>
                        <div class="mb-3 mt-3 col-sm-6">
                            <label for="editPhone" class="form-label">Student Phone:</label>
                            <input type="text" class="form-control" id="editPhone" placeholder="Student Phone">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Update Student</button>
                </form>
            </div>

        </div>
    </div>
</div>


<script>
    


    
</script>
