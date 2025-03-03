@extends('layout.app')

@section('content')
<div>
    <div class=" shadow">
        <div class="card-body px-4 px-md-5 pt-md-5 pt-3">
            <div class="d-md-flex justify-content-between mb-4 mb-m-0">
                <h1 class="mb-m-4">Medical Details</h1>
            </div>
        </div>
        <div class="card-body px-4 px-md-5 pb-5">
            <p class="card-text"><strong>Name:</strong> {{ $medical->patient->lastname }}, {{ $medical->patient->firstname }} {{ $medical->patient->middlename }}</p>
            <p class="card-text"><strong>Medical Type:</strong> {{ ucfirst($medical->request_type) }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($medical->status) }}</p>
            <p class="card-text"><strong>Priority:</strong> {{ ucfirst($medical->priority) }}</p>
            <p class="card-text"><strong>Findings:</strong> {{ $medical->findings ?? 'N/A' }}</p>
            <p class="card-text"><strong>Test Action Date:</strong> {{ \Carbon\Carbon::parse($medical->test_date)->format('F j, Y') }}</p>
            <p class="card-text"><strong>Condition:</strong> {{ $medical->condition }}</p>
            <p class="card-text"><strong>Comments:</strong> {{ $medical->description ?? 'N/A' }}</p>

        </div>
    </div>
</div>
@endsection
