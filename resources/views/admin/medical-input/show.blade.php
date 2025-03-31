@extends('layout.app')

@section('content')
    <div>
        <div class="shadow">
            <div class="card-body px-4 px-md-5 pt-md-5 pt-3">
                <div class="d-md-flex justify-content-between mb-4 mb-m-0">
                    <h1 class="mb-m-4">Medical Details</h1>
                    <div>
                        <a href="{{ route('admin.requests.edit', $medical->id) }}" class="btn btn-warning">
                            Update Medical Details
                        </a>
                        {{-- <!-- Delete Button with Form -->
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $medical->id }}">
                            <i class="fas fa-trash"></i>
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="card-body px-4 px-md-5 pb-5">
                <div class="row align-items-center">
                    <!-- Left Side: Medical Details -->
                    <div class="col-md-6">
                        <p class="card-text"><strong>Name:</strong> {{ $medical->patient->lastname }},
                            {{ $medical->patient->firstname }} {{ $medical->patient->middlename }}</p>
                        <p class="card-text"><strong>Medical Type:</strong> {{ ucfirst($medical->request_type) }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ ucfirst($medical->status) }}</p>
                        {{-- <p class="card-text"><strong>Priority:</strong> {{ ucfirst($medical->priority) }}</p> --}}
                        <p class="card-text"><strong>Findings:</strong> {{ $medical->findings ?? 'N/A' }}</p>
                        <p class="card-text"><strong>Test Action Date:</strong>
                            {{ \Carbon\Carbon::parse($medical->test_date)->format('F j, Y') }}</p>
                        {{-- <p class="card-text"><strong>Condition:</strong> {{ $medical->condition }}</p> --}}
                        <p class="card-text"><strong>Comments:</strong> {{ $medical->description ?? 'N/A' }}</p>
                    </div>
                    <!-- Right Side: Patient Picture -->
                    <div class="col-md-6 text-center">
                        @if ($medical->file_path)
                            <a href="{{ asset($medical->file_path) }}" target="_blank">
                                <img src="{{ asset($medical->file_path) }}" alt="Patient Picture"
                                    class="img-fluid rounded shadow-sm"
                                    style="width: 100%; max-width: 350px; height: auto; transition: transform 0.2s;"
                                    onmouseover="this.style.transform='scale(1.1)';"
                                    onmouseout="this.style.transform='scale(1)';">
                            </a>
                        @else
                            <p class="text-muted">No picture available.</p>
                        @endif
                    </div>

                    <hr class="mt-4">
                    @include('patient.ai')
                    <hr>
                    <!-- Doctor Comments Section -->
                    <div class="doctor-comments mt-4">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-text mb-3"><strong>Doctor's Comments:</strong></h4>
                            <div>
                                @if (empty($treatment->interpretation_comments) &&
                                        empty($treatment->recommendations) &&
                                        empty($treatment->prescriptions) &&
                                        empty($treatment->result_summary))
                                @else
                                    <a href="{{ route('admin.medical-edit.comments', $treatment->id) }}"
                                        class="btn btn-warning">
                                        Update Comments
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if (
                            !empty($treatment->interpretation_comments) ||
                                !empty($treatment->recommendations) ||
                                !empty($treatment->prescriptions) ||
                                !empty($treatment->result_summary))
                            <p class="card-text"><strong>Interpretations:</strong>
                                {{ $treatment->interpretation_comments }}
                            </p>
                            <p class="card-text"><strong>Recommendations:</strong> {{ $treatment->recommendations }}</p>
                            <p class="card-text"><strong>Prescriptions:</strong> {{ $treatment->prescriptions }}</p>
                            <p class="card-text"><strong>Result summary:</strong> {{ $treatment->result_summary }}</p>
                            <p class="card-text"><strong>Comments Date Taken:</strong>
                                {{ \Carbon\Carbon::parse($treatment->created_at)->format('F j, Y') }}</p>
                        @else
                            <div>
                                No doctor comments available...
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
