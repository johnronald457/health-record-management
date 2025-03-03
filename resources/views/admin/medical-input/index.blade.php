@extends('layout.app')

@section('content')
<div class="shadow mb-4 w-full p-3 p-m-5">
    <div class="card-header">
        <div class="row no-gutters align-items-center">
            <div class="d-flex justify-content-between">

            <div class="col mr-2">
                <h1 class="display-6 fw-bolder text-uppercase">Medical Input</h1>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $medicals->count() }}</div>
            
                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-user-gear fa-4x text-gray-500 pr-3"></i>
                </div>
                <div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#createRequestModal" class="btn btn-primary"><i class="fas fa-edit me-2"></i>Request</button>
                </div>
            </div>
            </div>

        </div>
        <div class="">

            <div class="table table-responsive">
                <table class="table table-hover" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-light ">
                            <!-- <th>Patient ID</th> -->
                            <th>Name</th>
                            <th>Medical Type</th>
                            <th>Priority level</th>
                            <th>Preferred date</th>
                            <th>Scheduled date</th>
                            <th>Test date</th>
                            <th>Status</th>
                            <th>Attachment</th>
                            <th>Comments</th>
                            <!-- <th>Doctor name</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicals as $medical)
<tr style="cursor: {{ $medical->status == 'pending' ? 'not-allowed' : 'pointer' }};" 
    onclick="{{ $medical->status == 'pending' ? 'event.preventDefault();' : 'window.location=\''. route('admin.requests.show', $medical->id) .'\';' }}">                  
                                <td>{{ $medical->patient->firstname }} {{ $medical->patient->lastname }}</td>
                                <td>{{ ucfirst($medical->request_type) }}</td>
                                <td>{{ ucfirst($medical->priority) }}</td>
                                <td>{{ $medical->preferred_date }}</td>
                                <td>{{ $medical->schedule_date ?? 'N/A' }}</td>
                                <td>{{ $medical->test_date ?? 'N/A'}}</td>
                                <td>{{  ucfirst($medical->status) }}</td>
                                <td>{{ ucfirst($medical->file_path ?? 'N/A')  }}</td>
                                <td>{{ ucfirst($medical->description ?? 'N/A')  }}</td>
                                <!-- <td>{{ $medical->doctor_name ?? 'N/A' }}</td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin.medical-input.create')