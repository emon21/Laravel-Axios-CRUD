
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Student</h5>

                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
