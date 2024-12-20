<div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Student</h5>

                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>


            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="d-flex">
                    <div class="form-group col-sm-2">
                        <label for="form-label">User Name :</label>
                    </div>
                    <div class="form-group col-sm-10">
                        <input type="text" id="Email" class="form-control" readonly value="Hasib">
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="studentName" class="form-label">Student Name:</label>
                    <input type="text" readonly class="form-control" id="viewName" placeholder="Student Name">
                    <span id="error" class="text-danger"></span>
                </div>
                <div class="d-flex gap-2">
                    <div class="mb-3 mt-3 col-sm-6">
                        <label for="studentEmail" class="form-label">Student Email:</label>
                        <input type="email" readonly class="form-control" id="viewEmail" placeholder="Student Email">
                    </div>
                    <div class="mb-3 mt-3 col-sm-6">
                        <label for="studentPhone" class="form-label">Student Phone:</label>
                        <input type="text" readonly class="form-control" id="viewPhone" placeholder="Student Phone">
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
