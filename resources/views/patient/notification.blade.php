@extends('layout.app')

@section('content')
    <div class="mx-3 mt-5">
        <h1 class="mb-4">Notification</h1>
        
        <!-- Check if there are any records -->
        @if($notifyStudents->isEmpty())
            <div class="alert alert-warning" role="alert">
                No records found.
            </div>
        @else
                    <!-- <div class="table table-responsive"> -->

                <table class="table table-hover" id="myTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="table ">
                        <th>Patient Name</th>
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
                                    @else badge-danger text-danger @endif">
                                    {{ ucfirst($notifyStudent->decision) }}
                                </span>
                            </td>
                            <td>{{ $notifyStudent->contact_no ?? 'N/A' }}</td>
                            <td>
                                <!-- Edit Button -->
                                @if($notifyStudent->decision == 'pending')
                                    <a href="{{ route('notify_students.agree', $notifyStudent->id) }}" class="btn btn-success btn-sm w-100 mr-2">Agree</a>
                                @elseif($notifyStudent->decision == 'yes')
                                    <button class="btn btn-success btn-sm" disabled>Agreed</button>
                                @endif



                                    <!-- Decline Button with input for number if decision is pending -->
                                @if($notifyStudent->decision == 'pending')
                                    <form action="{{ route('notify_students.decline', $notifyStudent->id) }}" method="POST">
                                        @csrf
                                        <div class="input-group mt-2">
                                            <input type="text" class="form-control" name="contact_no" placeholder="Please provide number" maxlength="11" pattern="\d{11}" required>
                                            <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                        </div>
                                    </form>
                                @elseif($notifyStudent->decision == 'no')
                                    <button class="btn btn-danger btn-sm" disabled>Declined</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
@endsection