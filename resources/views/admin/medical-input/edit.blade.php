@extends('layout.app')

@section('content')
    <div>
        <div class="shadow">
            <div class="card-body px-4 px-md-5 pt-md-5 pt-3">
                <div class="d-md-flex justify-content-between mb-4 mb-m-0">
                    <h1 class="mb-m-4">Edit Medical Details</h1>
                    {{-- <div>
                        <a href="{{ route('admin.requests.show', $medical->id) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body px-4 px-md-5 pb-5">
                <!-- Form para sa pag-edit ng medical details -->
                <form action="{{ route('admin.request.update', $medical->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Patient Name (Read-only) -->
                        <div class="col-md-6 mb-3">
                            <label for="patientName" class="form-label"><strong>Patient Name:</strong></label>
                            <input type="text" class="form-control" id="patientName"
                                value="{{ $medical->patient->lastname }}, {{ $medical->patient->firstname }} {{ $medical->patient->middlename }}"
                                readonly>
                        </div>

                        <!-- Medical Type -->
                        <div class="col-md-6 mb-3">
                            <label for="request_type" class="form-label">Medical Type</label>
                            <input type="text" class="form-control" id="request_type" name="request_type"
                                value="{{ $medical->request_type }}" required>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label"><strong>Status:</strong></label>
                            <input type="text" class="form-control" id="status" name="status"
                                value="{{ $medical->status == 'pending' ? 'Pending' : 'Done' }}" readonly>
                        </div>

                        <!-- Condition -->
                        <div class="col-md-6 mb-3">
                            <label for="condition" class="form-label"><strong>Condition:</strong></label>
                            <select class="form-select" id="condition" name="condition" required>
                                <option value="unspecified" {{ $medical->condition == 'unspecified' ? 'selected' : '' }}>
                                    Unspecified</option>
                                <option value="sensitive" {{ $medical->condition == 'sensitive' ? 'selected' : '' }}>
                                    Sensitive</option>
                                <option value="non-sensitive"
                                    {{ $medical->condition == 'non-sensitive' ? 'selected' : '' }}>Non-Sensitive</option>
                            </select>
                        </div>


                        <!-- Priority -->
                        <div class="col-md-6 mb-3">
                            <label for="priority" class="form-label"><strong>Priority:</strong></label>
                            <select class="form-select" id="priority" name="priority" required>
                                <option value="low" {{ $medical->priority == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ $medical->priority == 'medium' ? 'selected' : '' }}>Medium
                                </option>
                                <option value="high" {{ $medical->priority == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                        </div>

                        <!-- Test Action Date -->
                        <div class="col-md-6 mb-3">
                            <label for="testDate" class="form-label"><strong>Test Action Date:</strong></label>
                            <input type="date" class="form-control" id="testDate" name="test_date"
                                value="{{ \Carbon\Carbon::parse($medical->test_date)->format('Y-m-d') }}" required>
                        </div>


                        <!-- Findings -->
                        {{-- <div class="col-md-6 mb-3">
                            <label for="findings" class="form-label"><strong>Findings:</strong></label>
                            <textarea class="form-control" id="findings" name="findings" rows="3">{{ $medical->findings ?? '' }}</textarea>
                        </div>
                        <!-- Comments -->
                        <div class="col-md-6 mb-3">
                            <label for="description" class="form-label"><strong>Comments:</strong></label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $medical->description ?? '' }}</textarea>
                        </div> --}}

                    </div>
                    <!-- Submit Button -->
                    <div class="d-flex float-end">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Go Back</a>
                        <button type="submit" class="btn btn-warning">Update Details</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
