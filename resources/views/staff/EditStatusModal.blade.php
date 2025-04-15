<div class="modal fade" id="editStatusModal{{$medical->id}}" tabindex="-1" aria-labelledby="editStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel">Edit Medical Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form action="{{ route('staff.updateStatus', $medical->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="patient_id" class="form-label">Patient Name</label>
                            <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ $medical->patient->firstname }} {{ $medical->patient->lastname }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="request_type" class="form-label">Medical Type</label>
                            <input type="text" class="form-control" id="request_type" name="request_type" value="{{ ucfirst($medical->request_type) }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="test_date" class="form-label">Test Date</label>
                            <input type="date" class="form-control" id="test_date" name="test_date"
                                >
                        </div>
                        <div class="mb-3">
                            <label for="request_type" class="form-label">Status</label>
                            <select class="form-select" id="request_type" name="request_type" required>
                                <option value="pending" {{ $medical->status == 'pending' ? 'selected' : '' }}>pending</option>
                                <option value="in-progress" {{ $medical->status == 'in-progress' ? 'selected' : '' }}>in-progress</option>    
                                <option value="done" {{ $medical->status == 'done' ? 'selected' : '' }}>done</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>