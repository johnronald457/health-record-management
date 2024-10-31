@extends('layout.app')

@section('content')

<div class="shadow mb-4 w-full p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                    <h2>Health Assessment</h2>
                        <form action="{{ route('patient.health-assessment.store') }}" method="POST">
                            @csrf

                            <!-- Personal Details -->
                            <h5 class="mb-3">Personal Details</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name"><strong>Name</strong></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $fullName }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="email"><strong>Email</strong></label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="emergency_contact"><strong>Emergency Contact</strong></label>
                                    <input type="text" name="emergency_contact" id="emergency_contact" class="form-control" value="{{ $user->emergency_contact }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="address"><strong>Address</strong></label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" disabled>
                                </div>
                            </div>

                            <hr>

                            <!-- Health Information -->
                            <h5 class="mb-3">Health Information</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="height"><strong>Height</strong></label>
                                    <input type="text" name="height" id="height" class="form-control" value="{{ old('height') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="weight"><strong>Weight</strong></label>
                                    <input type="text" name="weight" id="weight" class="form-control" value="{{ old('weight') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="blood_pressure"><strong>Blood Pressure</strong></label>
                                    <input type="text" name="blood_pressure" id="blood_pressure" class="form-control" value="{{ old('blood_pressure') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="heart_rate"><strong>Heart Rate</strong></label>
                                    <input type="text" name="heart_rate" id="heart_rate" class="form-control" value="{{ old('heart_rate') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="medical_conditions"><strong>Medical Conditions</strong></label>
                                    <input type="text" name="medical_conditions" id="medical_conditions" class="form-control" value="{{ old('medical_conditions') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="medical_history"><strong>Medical History</strong></label>
                                    <input type="text" name="medical_history" id="medical_history" class="form-control" value="{{ old('medical_history') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="symptoms"><strong>Symptoms</strong></label>
                                    <input type="text" name="symptoms" id="symptoms" class="form-control" value="{{ old('symptoms') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="allergies"><strong>Allergies</strong></label>
                                    <input type="text" name="allergies" id="allergies" class="form-control" value="{{ old('allergies') }}">
                                </div>
                            </div>
                            <div class="d-flex mt-3 float-end">
                                <button type="submit" class="btn btn-primary mt-3">Save Assessment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
