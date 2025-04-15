@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Notify Students List</h1>
        
        <!-- Check if there are any records -->
        @if($notifyStudents->isEmpty())
            <div class="alert alert-warning" role="alert">
                No records found.
            </div>
        @else
                    <!-- <div class="table table-responsive"> -->

                <table class="table table-hover" id="myTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="table-light ">
                        <th>Patient ID</th>
                        <th>Target Date</th>
                        <th style="width: 500px;">Description</th>
                        <th>Decision</th>
                        <th>Contact No</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notifyStudents as $notifyStudent)
                        <tr>
                            <td>{{ $notifyStudent->patient->lastname }}, {{ $notifyStudent->patient->firstname }}</td>
                            <td>{{ \Carbon\Carbon::parse($notifyStudent->target_date)->format('F j, Y') }}</td>
                            <td>{{ $notifyStudent->description ?? 'N/A' }}</td>
                            <td>
                                <span class="badge 
                                    @if($notifyStudent->decision == 'pending') text-warning 
                                    @elseif($notifyStudent->decision == 'yes') text-success 
                                    @else text-danger @endif">
                                    {{ ucfirst($notifyStudent->decision) }}
                                </span>
                            </td>
                            <td>{{ $notifyStudent->contact_no ?? 'N/A' }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('notify_students.edit', $notifyStudent->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <!-- Delete Button -->
                                <form action="{{ route('notify_students.destroy', $notifyStudent->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        
        <!-- Create New Notify Student Button -->
        <a href="{{ route('notify_students.create') }}" class="btn btn-primary mt-3">Create New Notify Student</a>
    </div>
@endsection