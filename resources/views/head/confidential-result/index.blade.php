@extends('layout.app')

@section('content')
    <div class="shadow mb-4 w-full p-3 p-m-5">
        <div class="card-header">
            <div class="row no-gutters align-items-center">
                <div class="d-flex justify-content-between">

                    <div class="col mr-2">
                        <h1 class="display-6 fw-bolder text-uppercase">Confidential Result</h1>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $medicals->count() }}</div>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-solid fa-user-gear fa-4x text-gray-500 pr-3"></i>
                    </div>
                    <div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#createRequestModal"
                            class="btn btn-primary"><i class="fas fa-edit me-2"></i>Request</button>
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Medical Type</th>
                            <th class="text-center">Priority level</th>
                            <th class="text-center">Preferred date</th>
                            <th class="text-center">Scheduled date</th>
                            <th class="text-center">Test date</th>
                            <th class="text-center">Status</th>
                            {{-- <th class="text-center">Attachment</th> --}}
                            <th class="text-center">Condition</th>
                            <!-- <th>Doctor name</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicals as $medical)
                            <tr class="not-clickable">
                                <td class="text-center">{{ $medical->patient->firstname }} {{ $medical->patient->lastname }}
                                </td>
                                <td class="text-center">{{ ucfirst($medical->request_type) }}</td>
                                <td class="text-center">{{ ucfirst($medical->priority) }}</td>
                                <td class="text-center">{{ $medical->preferred_date }}</td>
                                <td class="text-center">{{ $medical->schedule_date ?? 'N/A' }}</td>
                                <td class="text-center">{{ $medical->test_date ?? 'N/A' }}</td>
                                <td class="text-center">
                                    @if ($medical->status == 'pending')
                                        <span class="badge bg-warning">{{ ucfirst($medical->status) }}</span>
                                    @else
                                        <span class="badge bg-success">{{ ucfirst($medical->status) }}</span>
                                    @endif
                                </td>
                                {{-- <td class="text-center"
                                    style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    @if ($medical->file_path)
                                        <a href="{{ asset($medical->file_path) }}" target="_blank"
                                            title="{{ $medical->file_path }}">
                                            {{ ucfirst(basename($medical->file_path)) }}
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td> --}}
                                <td class="text-center">
                                    @if ($medical->condition == 'sensitive')
                                        <span class="badge bg-danger">{{ Str::ucfirst($medical->condition) }}</span>
                                    @else
                                        {{ Str::ucfirst($medical->condition ?? 'N/A') }}
                                    @endif
                                </td>
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
