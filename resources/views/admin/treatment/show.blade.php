@extends('layout.app')

@section('content')
<div class="container">
    <div class=" shadow">
        <div class="card-body px-5 pt-5">
            <div class="d-flex justify-content-between">
                <h1 class="mb-4">Treatment Details</h1>
                <div>
                    <a href="{{ route('admin.health.edit', $treatment->health_assessment->id) }}" class="btn btn-primary"><i class="fas fa-edit me-2"></i>Edit</a>
                    <!-- Delete Button with Form -->
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $treatment->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body px-5 pb-5">
            <h5 class="card-text"><strong>{{$treatment->health_assessment->id}}Name:</strong> {{ $treatment->user->firstname }} {{ $treatment->lastname }}</h5>
            <br>
            <!-- <p class="card-text"><strong>Individual:</strong> {{ ucfirst($treatment->role) }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $treatment->email }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $treatment->address }}</p>
            <p class="card-text"><strong>Sex:</strong> {{ $treatment->sex }}</p>
            <p class="card-text"><strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($treatment->birthdate)->format('F j, Y') }}</p>
            <p class="card-text"><strong>Contact No:</strong> {{ $treatment->contact_no }}</p>
            <p class="card-text"><strong>Emergency Contact:</strong> {{ $treatment->emergency_contact }}</p> -->

        </div>
    </div>
</div>
@include('admin.treatment.ConfirmationDeleteModal')
@endsection
