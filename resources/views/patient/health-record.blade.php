@extends('layout.app')

@section('content')

<div class="shadow mb-4 w-full p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <h2>My Health Record</h2>
                    <div class="card-body">

                        <!-- Personal Details -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-muted">Patient ID: {{ $user->id }}</h6>
                                <p><strong>Name:</strong> {{ $fullName }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Emergency Contact:</strong> {{ $user->emergency_contact }}</p>
                                <p><strong>Address:</strong> {{ $user->address }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Health Information -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Height:</strong> {{ $healthData->height }}</p>
                                <p><strong>Weight:</strong> {{ $healthData->weight }}</p>
                                <p><strong>Blood Type:</strong> {{ $healthData->blood_type }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Medical Conditions:</strong> {{ $healthData->medical_conditions }}</p>
                                <p><strong>Allergies:</strong> {{ $healthData->allergies }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Recent Visits -->
                        <h6 class="mt-3">Recent Visits</h6>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reason</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($healthData->recent_visits) && is_array($healthData->recent_visits))
                                    @foreach($healthData->recent_visits as $visit)
                                        <tr>
                                            <td>{{ $visit['date'] }}</td>
                                            <td>{{ $visit['reason'] }}</td>
                                            <td>{{ $visit['notes'] }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No recent visits found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
