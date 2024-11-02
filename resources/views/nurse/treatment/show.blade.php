@extends('layout.app')

@section('content')
<div class="container">
    <div class=" shadow">
        <div class="card-body px-5 pt-5">
            <h1 class="mb-4">Treatment Details</h1>
        </div>
        <div class="card-body px-5 pb-5">
            <div class="health-assessment">
                    <h5 class="card-text"><strong>Patient Name:</strong> {{ $treatment->user->firstname }} {{ $treatment->user->lastname }}</h5>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h4 class="card-text mb-3"><strong>Assessment Details:</strong></h4>
                        <div>
                            <a href="{{ route('nurse.health.edit', $treatment->health_assessment->id) }}" class="btn btn-primary"><i class="fas fa-edit me-2"></i>Edit</a>
                            <!-- Delete Button with Form -->
                            <!-- <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $treatment->id }}">
                                <i class="fas fa-trash"></i>
                            </button> -->
                        </div>
                    </div>

                    <p class="card-text"><strong>Weight:</strong> {{ $treatment->health_assessment->weight }}</p>
                    <p class="card-text"><strong>Height:</strong> {{ $treatment->health_assessment->height }}</p>
                    <p class="card-text"><strong>Blood pressure:</strong> {{ $treatment->health_assessment->blood_pressure }}</p>
                    <p class="card-text"><strong>Heart rate:</strong> {{ $treatment->health_assessment->heart_rate }}</p>
                    <p class="card-text"><strong>Medical Condition:</strong> {{ $treatment->health_assessment->medical_conditions }}</p>
                    <p class="card-text"><strong>Medical History:</strong> {{ $treatment->health_assessment->medical_history }}</p>
                    <p class="card-text"><strong>Allergies:</strong> {{ $treatment->health_assessment->allergies }}</p>
                    <p class="card-text"><strong>Symptoms:</strong> {{ $treatment->health_assessment->symptoms }}</p>
                    <p class="card-text"><strong>Assessment Date Taken:</strong> {{ \Carbon\Carbon::parse($treatment->health_assessment->created_at)->format('F j, Y') }}</p>
                </div>
                <hr>
                <!-- Doctor Comments Section -->
                <div class="doctor-comments mt-4">
                    <div class="d-flex justify-content-between">
                    <h4 class="card-text mb-3"><strong>Doctor's Comments:</strong></h4>
                        <div>
                            <a href="" class="btn btn-primary"><i class="fas fa-edit me-2"></i>Edit</a>
                        </div>
                    </div>
                    <p class="card-text"><strong>Interpretaions:</strong> {{ $treatment->interpretation_comments }}</p>
                    <p class="card-text"><strong>Recommendations:</strong> {{ $treatment->recommendations }}</p>
                    <p class="card-text"><strong>Prescriptions:</strong> {{ $treatment->prescriptions }}</p>
                    <p class="card-text"><strong>Result summary:</strong> {{ $treatment->result_summary }}</p>
                    <p class="card-text"><strong>Comments Date Taken:</strong> {{ \Carbon\Carbon::parse($treatment->created_at)->format('F j, Y') }}</p>
                </div>
        </div>
    </div>
</div>
@endsection
