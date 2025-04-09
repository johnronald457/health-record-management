@extends('layout.app')

@section('content')
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
<div class="mx-4">
        <h1>Create Notify Student</h1>

        <!-- Form for creating a new notify student -->
        <form action="{{ route('notify_students.store') }}" method="POST">
            @csrf

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

            <!-- Target Date -->
            <div class="mb-3">
                <label for="target_date" class="form-label">Target Date</label>
                <input type="date" name="target_date" id="target_date" class="form-control">
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <!-- Decision -->
            <div class="mb-3">
                <label for="decision" class="form-label">Decision</label>
                <select name="decision" id="decision" class="form-control" required>
                    <option value="pending">Pending</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <!-- Contact Number -->
            <!-- <div class="mb-3">
                <label for="contact_no" class="form-label">Contact No</label>
                <input type="text" name="contact_no" id="contact_no" class="form-control">
            </div> -->

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create Notify Student</button>
        </form>

        <a href="{{ route('notify_students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
    <script src="{{ asset('assets/js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>


    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>

</html>
@endsection