@extends('layout.app')

@section('content')
<div class="shadow mb-4 w-full p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <h2>Health Assessment</h2>
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
                            <hr>
                            <h2>Treatment Details</h2>

                            @if ($treatment)
                            <strong>Interpretation Comments</strong>
                            <p>{{ $treatment->interpretation_comments }}</p>

                            <strong>Recommendations</strong>
                            <p>{{ $treatment->recommendations }}</p>

                            <strong>Prescriptions</strong>
                            <p>{{ $treatment->prescriptions }}</p>
                            
                            <strong>Result Summary</strong>
                            <p>{{ $treatment->result_summary }}</p>
                            
                            @else
                                <p>No treatment data provided yet...</p>
                            @endif

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection
