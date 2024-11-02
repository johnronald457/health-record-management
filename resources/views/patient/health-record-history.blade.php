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
                <p><strong>Name:</strong> China Bea</p>
                <p><strong>Date of Birth:</strong> 2001-12-22</p>
                <p><strong>Gender:</strong> Female</p>
                <p><strong>Contact Information:</strong> chinabea@gmail.com</p>
            </div>

            <!-- Visit Information Section -->
            <div class="mb-4">
                <h5 class="text-primary">Visit Information</h5>
                <hr>
                <p><strong>Visit Date:</strong> 2024-10-28</p>
                <p><strong>Doctor Name:</strong> Dr. Mark Louis</p>
                <p><strong>Visit Reason:</strong> Routine check-up</p>
            </div>

            <!-- Symptoms Section -->
            <div class="mb-4">
                <h5 class="text-primary">Symptoms</h5>
                <hr>
                <p>Fever, headache, mild chest pain, fatigue</p>
            </div>

            <!-- Vital Signs Section -->
            <div class="mb-4">
                <h5 class="text-primary">Vital Signs</h5>
                <hr>
                <p><strong>Blood Pressure:</strong> 120/80 mmHg</p>
                <p><strong>Pulse Rate:</strong> 75 bpm</p>
                <p><strong>Temperature:</strong> 98.6°F</p>
                <p><strong>Respiratory Rate:</strong> 16 breaths/min</p>
                <p><strong>Oxygen Saturation:</strong> 98%</p>
            </div>

            <!-- Diagnosis Section -->
            <div class="mb-4">
                <h5 class="text-primary">Diagnosis</h5>
                <hr>
                <p><strong>Diagnosis:</strong> Mild Viral Infection</p>
                <p><strong>Diagnosis Suggestions:</strong> Monitor symptoms, increase fluid intake, rest</p>
            </div>

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

            <!-- Additional Notes Section -->
            <div class="mb-4">
                <h5 class="text-primary">Additional Notes</h5>
                <hr>
                <p><strong>Doctor's Notes:</strong> Patient advised to rest and stay hydrated. Return if symptoms worsen.</p>
                <p><strong>Patient Feedback:</strong> Feeling slightly better, no severe discomfort</p>
            </div>

            <!-- History Overview Section -->
            <div class="mb-4">
                <h5 class="text-primary">History Overview</h5>
                <hr>
                <p><strong>Previous Conditions:</strong> Seasonal allergies, mild asthma</p>
                <p><strong>Allergies:</strong> None reported</p>
                <p><strong>Immunization Records:</strong> Up-to-date, including flu vaccine</p>
                <p><strong>Family Medical History:</strong> History of heart disease in paternal side</p>
            </div>
        </div>
    </div>
</div>
@endsection
