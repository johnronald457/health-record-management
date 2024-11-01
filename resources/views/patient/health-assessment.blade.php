@extends('layout.app')

@section('content')
<div class="shadow mb-4 w-full p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <h2>Create Health Assessment</h2>
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
                                <a href="{{ route('health.edit', $healthData->id) }}" class="btn btn-warning">Update Assessment</a>
                            </div>
                            <!-- @php
                                $oneMonthAgo = now()->subMonth();
                            @endphp

                            <div class="d-flex mt-3 float-end">
                                @if($healthData->created_at <= $oneMonthAgo)
                                    <a href="{{ route('health.create') }}" class="btn btn-primary">Create New Assessment</a>
                                @else
                                    <a href="{{ route('health.edit', $healthData->id) }}" class="btn btn-warning">Update Assessment</a>
                                @endif
                            </div> -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
