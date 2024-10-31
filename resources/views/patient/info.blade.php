@extends('layout.app')

@section('content')
<div class="shadow mb-4 w-full p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2>Student Information</h2>
                        <!-- <h6 class="card-subtitle mb-2 text-muted">Student ID: {{ $user->id }}</h6> -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label><strong>Name</strong></label>
                                <p>{{ $fullName }}</p>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Gender</strong></label>
                                <p>{{ $user->sex ?? 'not applicable' }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label><strong>Birthdate</strong></label>
                                <p>{{ $user->birthdate ? \Carbon\Carbon::parse($user->birthdate)->format('F j, Y') : 'not applicable' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Email</strong></label>
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label><strong>Phone</strong></label>
                                <p>{{ $user->contact_no ?? 'not applicable' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Emergency Contact</strong></label>
                                <p>{{ $user->emergency_contact }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label><strong>Year Level</strong></label>
                                <p>{{ $user->year ?? 'not applicable' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Address</strong></label>
                                <p>{{ $user->address }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label><strong>Section</strong></label>
                                <p>{{ $user->section ?? 'not applicable' }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <h2>Health Assessment</h2>
                        <form action="{{ route('patient.health-assessment.store') }}" method="POST" id="healthForm">
                            @csrf
                            @if ($healthData)
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label><strong>Height</strong></label>
                                    <p>{{ $healthData->height ?? old('height') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Weight</strong></label>
                                    <p>{{ $healthData->weight ?? old('weight') }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label><strong>Blood Pressure</strong></label>
                                    <p>{{ $healthData->blood_pressure ?? old('blood_pressure') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Heart Rate</strong></label>
                                    <p>{{ $healthData->heart_rate ?? old('heart_rate') }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label><strong>Medical Conditions</strong></label>
                                    <p>{{ $healthData->medical_conditions ?? old('medical_conditions') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Medical History</strong></label>
                                    <p>{{ $healthData->medical_history ?? old('medical_history') }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label><strong>Symptoms</strong></label>
                                    <p>{{ $healthData->symptoms ?? old('symptoms') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label><strong>Allergies</strong></label>
                                    <p>{{ $healthData->allergies ?? old('allergies') }}</p>
                                </div>
                            </div>
                            <div class="d-flex mt-3 float-end">
                                <a href="{{ route('health.edit', $healthData->id) }}" class="btn btn-warning">Update Assessment</a>
                            </div>
                            @else
                                <p>Assessment data not available..</p>
                                <div class="d-flex mt-3 float-end">
                                    <a href="{{ route('patient.create-health-assessment') }}" class="btn btn-warning">Provide Assessment</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
