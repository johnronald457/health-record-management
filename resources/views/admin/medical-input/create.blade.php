<!-- Create Request Modal -->
<div class="modal fade" id="createRequestModal" tabindex="-1" aria-labelledby="createRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRequestModalLabel">Create Medical Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="request_type" class="form-label">Medical Type</label>
                        <input type="text" class="form-control" id="request_type" name="request_type" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="description" class="form-label">Comments</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div> -->
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority Level</label>
                        <select class="form-control" id="priority" name="priority" required>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="preferred_date" class="form-label">Preferred Date</label>
                        <input type="date" class="form-control" id="preferred_date" name="preferred_date" required>
                    </div>
                    <!-- Additional fields as needed -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>