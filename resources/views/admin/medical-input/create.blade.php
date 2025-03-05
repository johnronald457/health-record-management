<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestlink College of the Philippines</title>
    <link rel="icon" type="image/png" href="{{ asset('img/medic_logo.png') }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/selectbutton/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">
</head>

<body>

    <div class="modal fade" id="createRequestModal" tabindex="-1" aria-labelledby="createRequestModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createRequestModalLabel">Create Medical Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.requests.store') }}" method="POST">
                        @csrf
                        <!-- <div class="mb-3">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                    </div> -->
                        <div class="mb-3">
                            <label for="request_type" class="form-label">Patient Name</label>
                            <select class="selectpicker form-control" id="patient_id" data-live-search="true"
                                id="dropdown-options" name="patient_id" required>
                                <option></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->firstname }}
                                        {{ $user->middlename }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="request_type" class="form-label">Medical Type</label>
                            <input type="text" class="form-control" id="request_type" name="request_type" required>
                        </div>

                        <!-- Create a searchable dropdown for users -->


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
                            <input type="date" class="form-control" id="preferred_date" name="preferred_date"
                                required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>


    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>







</body>

</html>
