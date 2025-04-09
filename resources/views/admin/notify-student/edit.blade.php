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
    <h1>Update Notify Student</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('notify_students.update', $notifyStudent->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="patient_id">Patient Name</label>
        <select class="selectpicker form-control" id="patient_id" data-live-search="true" name="patient_id" disabled>
            <option value="" disabled>Select Patient</option> <!-- Empty option to prompt user -->
            @foreach ($users as $user)
                <option value="{{ $user->id }}" 
                        {{ old('patient_id', $notifyStudent->patient_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->lastname }}, {{ $user->firstname }} {{ $user->middlename }}
                </option>
            @endforeach
        </select>

        </div>

        <div class="form-group mt-3">
            <label for="target_date">Target Date</label>
            <input type="date" class="form-control" id="target_date" name="target_date"
                value="{{ old('target_date', optional($notifyStudent->target_date)->format('Y-m-d')) }}">
        </div>


        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $notifyStudent->description) }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="decision">Decision</label>
            <select class="form-control" id="decision" name="decision" required>
                <option value="pending" {{ old('decision', $notifyStudent->decision) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="yes" {{ old('decision', $notifyStudent->decision) == 'yes' ? 'selected' : '' }}>Yes</option>
                <option value="no" {{ old('decision', $notifyStudent->decision) == 'no' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="contact_no">Contact Number</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ old('contact_no', $notifyStudent->contact_no) }}" maxlength="15">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Notify Student</button>
    </form>
</div>
    <script src="{{ asset('assets/js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>


    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>

</html>
@endsection
