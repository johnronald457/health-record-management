@extends('layout.app')

@section('content')

<!-- <div class="shadow mb-4 w-full p-5"> -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                <h2>Student Information</h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="card-subtitle mb-2 text-muted">Student ID: {{ $user->id }}</h6>
                                <p class="card-text"><strong>Name:</strong> {{ $user->firstname }} {{ $user->middlename }}. {{ $user->lastname }}</p>
                                <p class="card-text"><strong>Gender:</strong> {{ $user->gender ?? 'not applicable' }}</p>
                                <p class="card-text"><strong>Age:</strong> {{ $user->age ?? 'not applicable' }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                <p class="card-text"><strong>Phone:</strong> {{ $user->phone ?? 'not applicable' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Course:</strong> {{ $user->course ?? 'not applicable' }}</p>
                                <p class="card-text"><strong>Year Level:</strong> {{ $user->year_level ?? 'not applicable' }}</p>
                                <p class="card-text"><strong>Section:</strong> {{ $user->section ?? 'not applicable' }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h2>Health Assessment</h2>
                    
                    <div class="card-body">
                        <form action="{{ route('patient.health-assessment.store') }}" method="POST" id="healthForm">
                            @csrf
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name"><strong>Name</strong></label>
                                    <p>{{ $fullName }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="email"><strong>Email</strong></label>
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="emergency_contact"><strong>Emergency Contact</strong></label>
                                    <p>{{ $user->emergency_contact }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="address"><strong>Address</strong></label>
                                    <p>{{ $user->address }}</p>
                                </div>
                            </div>

                            <hr>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="height"><strong>Height</strong></label>
                                    <p>{{ $healthData->height ?? old('height') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="weight"><strong>Weight</strong></label>
                                    <p>{{ $healthData->weight ?? old('weight') }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="blood_pressure"><strong>Blood Pressure</strong></label>
                                    <p>{{ $healthData->blood_pressure ?? old('blood_pressure') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="heart_rate"><strong>Heart Rate</strong></label>
                                    <p>{{ $healthData->heart_rate ?? old('heart_rate') }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="medical_conditions"><strong>Medical Conditions</strong></label>
                                    <p>{{ $healthData->medical_conditions ?? old('medical_conditions') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="medical_history"><strong>Medical History</strong></label>
                                    <p>{{ $healthData->medical_history ?? old('medical_history') }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="symptoms"><strong>Symptoms</strong></label>
                                    <p>{{ $healthData->symptoms ?? old('symptoms') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="allergies"><strong>Allergies</strong></label>
                                    <p>{{ $healthData->allergies ?? old('allergies') }}</p>
                                </div>
                            </div>
                            
                            <div class="d-flex mt-3 float-end">
                                @if ($healthData)
                                    <a href="{{ route('health.edit', $healthData->id) }}" class="btn btn-warning">Update Assessment</a>
                                @else
                                    <p>No health data available</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->



@endsection
