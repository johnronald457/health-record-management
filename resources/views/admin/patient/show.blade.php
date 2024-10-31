@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h1 class="mb-4">Patient Details</h1>
                <div>
                    <a  class="btn btn-primary"><i class="fas fa-edit me-2"></i>Edit</a>
                    <!-- Delete Button with Form -->
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $patient->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-text"><strong>Name:</strong> {{ $patient->firstname }} {{ $patient->lastname }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ ucfirst($patient->role) }}</h6>
            @php
                $role = auth()->user()->role;
            @endphp
            @if($role === 'student')   
            <p class="card-text"><strong>Section:</strong>{{ $patient->year }} - {{ $patient->section }}</p>
            @endif
            <p class="card-text"><strong>Sex:</strong> {{ $patient->sex }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $patient->email }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $patient->address }}</p>
            <p class="card-text"><strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($patient->birthdate)->format('F j, Y') }}</p>
            <p class="card-text"><strong>Contact No:</strong> {{ $patient->contact_no }}</p>
            <p class="card-text"><strong>Emergency Contact:</strong> {{ $patient->emergency_contact }}</p>

        </div>
    </div>
</div>
@include('admin.patient.ConfirmationDeleteModal')
@endsection
