@extends('layout.app')

@section('content')
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Confidential Findings</h3>

                <!-- Confidential Findings Section -->
                <div class="mb-4">
                    <h5 class="text-danger">Confidential Findings</h5>
                    <hr>
                    <p><strong>Patient ID:</strong> 10234</p>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Date of Birth:</strong> 2001-12-22</p>
                    <p><strong>Gender:</strong> Male</p>
                    <p><strong>Contact Information:</strong> johndoe@gmail.com</p>
                </div>

                <!-- Sensitive Medical Information Section -->
                <div class="mb-4">
                    <h5 class="text-danger">Sensitive Medical Information</h5>
                    <hr>
                    <p><strong>HIV Status:</strong> Positive</p>
                    <p><strong>Hepatitis B Status:</strong> Positive</p>
                    <p><strong>Hepatitis C Status:</strong> Positive</p>
                    <p><strong>STD Screening Results:</strong> Positive</p>
                    <p><strong>Genetic Testing Results:</strong> Significant findings</p>
                </div>

                <!-- Mental Health Information Section -->
                <div class="mb-4">
                    <h5 class="text-danger">Mental Health Information</h5>
                    <hr>
                    <p><strong>Depression Screening:</strong> Positive</p>
                    <p><strong>Anxiety Screening:</strong> Positive</p>
                    <p><strong>Psychiatric History:</strong> Reported</p>
                    <p><strong>Current Medications:</strong> Prescribed</p>
                </div>

                <!-- Substance Abuse Information Section -->
                <div class="mb-4">
                    <h5 class="text-danger">Substance Abuse Information</h5>
                    <hr>
                    <p><strong>Alcohol Use:</strong> Frequent</p>
                    <p><strong>Smoking Status:</strong> Smoker</p>
                    <p><strong>Drug Use:</strong> Reported</p>
                </div>

                <!-- Additional Confidential Notes Section -->
                <div class="mb-4">
                    <h5 class="text-danger">Additional Confidential Notes</h5>
                    <hr>
                    <p><strong>Doctor's Confidential Notes:</strong> Patient shows signs of substance abuse and mental
                        health issues. Some screenings are positive.</p>
                    <p><strong>Counselor's Notes:</strong> Patient is struggling with stress and needs a better support
                        system.
                    </p>
                </div>

                <!-- Access Log Section -->
                <div class="mb-4">
                    <h5 class="text-danger">Access Log</h5>
                    <hr>
                    <p><strong>Last Accessed By:</strong> Dr. Mark Louis</p>
                    <p><strong>Last Access Date:</strong> 2024-10-28</p>
                    <p><strong>Access Reason:</strong> Routine check-up</p>
                </div>
            </div>
        </div>
    </div>
@endsection
