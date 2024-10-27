@extends('layout.app')

@section('content')

<div class="shadow mb-4 w-full p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                <h2>Student Information</h2>
                    <!-- <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Student Information</h5>
                    </div> -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="card-subtitle mb-2 text-muted">Student ID: {{ $user->id }}</h6>
                                <p class="card-text"><strong>Name:</strong> {{ $user->firstname }} {{ $user->middlename }}. {{ $user->lastname }}</p>
                                <p class="card-text"><strong>Gender:</strong> {{ $user->gender ?? 'not applicable' }}</p>
                                <p class="card-text"><strong>Age:</strong> {{ $user->age ?? 'not applicable' }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                <p class="card-text"><strong>Phone:</strong> {{ $user->phone ?? 'not applicable' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Course:</strong> {{ $user->course ?? 'not applicable' }}</p>
                                <p class="card-text"><strong>Year Level:</strong> {{ $user->year_level ?? 'not applicable' }}</p>
                                <p class="card-text"><strong>Section:</strong> {{ $user->section ?? 'not applicable' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
