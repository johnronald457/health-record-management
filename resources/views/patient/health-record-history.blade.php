@extends('layout.app')

@section('content')
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Patient Health Record</h3>

                <!-- Patient Information Section -->
                <div class="mb-4">
                    <h5 class="text-primary">Patient Information</h5>
                    <hr>
                    <!-- <p><strong>Patient ID:</strong> 10234</p> -->
                    <p><strong>Name:</strong> {{ $fullName }}</p>
                    <p><strong>Date of Birth:</strong>{{ \Carbon\Carbon::parse($patient->birthdate)->format('Y-m-d') }}</p>
                    <p><strong>Gender:</strong> {{ UCFirst($patient->sex) }}</p>
                    <p><strong>Address:</strong> {{ $patient->address }}</p>
                    <p><strong>Emergency Contact:</strong> {{ $patient->emergency_contact }}</p>
                </div>

                <!-- Vital Signs Section -->
                <div class="mb-4">
                    <h5 class="text-primary">Health Assessment</h5>
                    <hr>
                    <p><strong>Weight:</strong> {{ $healthData->weight ?? 'N/A' }}</p>
                    <p><strong>Height:</strong> {{ $healthData->height ?? 'N/A' }}</p>
                    <p><strong>Blood Pressure:</strong> {{ $healthData->blood_pressure ?? 'N/A' }}</p>
                    <p><strong>Heart Rate:</strong> {{ $healthData->heart_rate ?? 'N/A' }}</p>
                    <p><strong>Allergies:</strong> {{ $healthData->allergies ?? 'N/A' }}</p>
                    <p><strong>Symptoms:</strong> {{ $healthData->symptoms ?? 'N/A' }}</p>
                </div>

                <!-- Diagnosis Section -->
                <!-- <div class="mb-4">
                    <h5 class="text-primary">Diagnosis</h5>
                    <hr>
                    <p><strong>Diagnosis:</strong> Mild Viral Infection</p>
                    <p><strong>Diagnosis Suggestions:</strong> Monitor symptoms, increase fluid intake, rest</p>
                </div> -->

                <!-- Recommended Tests Section -->
                <div class="mb-4">
                    <h5 class="text-primary">Recommended Tests</h5>
                    <hr>
                    <ul>
                        <li>Blood Test - Complete Blood Count (CBC) - <strong>Result:</strong> Normal (2024-10-29)</li>
                        <li>Chest X-ray - <strong>Result:</strong> Clear (2024-10-29)</li>
                    </ul>
                </div>

                <!-- Treatment Plan Section -->
                <div class="mb-4">
                    <h5 class="text-primary">Treatment Plan</h5>
                    <hr>
                    <p><strong>Treatment Description:</strong> Symptomatic treatment for viral infection</p>
                    <p><strong>Medications Prescribed:</strong> Acetaminophen (500 mg) - 1 tablet every 6 hours</p>
                    <p><strong>Treatment Start Date:</strong> 2024-10-28</p>
                    <p><strong>Treatment End Date:</strong> 2024-11-02</p>
                    <p><strong>Follow-up Required:</strong> Yes, in 1 week</p>
                </div>

                <!-- History Overview Section -->
                <div class="mb-4">
                    <h5 class="text-primary">Medical Taken</h5>
                    @foreach ($medicals as $medical)
                        <hr>
                        <p><strong>Medical Type:</strong> {{ $medical->request_type }}</p>
                        <p><strong>Doctor:</strong> {{ $medical->doctor_name }}</p>
                        <p><strong>Test Date:</strong> {{ $medical->test_date }}</p>
                        <p><strong>Findings:</strong> {{ $medical->findings }}</p>
                        <p><strong>Doctor Comments:</strong> {{ $medical->doctor_comments }}</p>
                        <p><strong>AI Analysis Comments:</strong> {{ $medical->AI_comments }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
