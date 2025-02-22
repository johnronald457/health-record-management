@extends('layout.app')

@section('content')
    <div class="shadow mb-4 w-full p-md-5">
        <div class="container">
            <div class="row">
                <div class="col mr-0">
                    <h1 class="display-6 fw-bolder text-uppercase">Health Record</h1>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <strong>Total:</strong>
                            </div>
                            <div class="h5 ms-1 mb-1.5 font-weight-bold text-gray-800" id="patientCount">
                                {{ $patients->count() }}</div>
                        </div>
                        {{-- Search bar --}}
                        <x-searchBar placeholder="Search patients..." />
                    </div>

                </div>

                <div class="card-body">


                    <div class="table table-responsive">
                        <table class="table table-hover" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="table-light ">
                                    <!-- <th>Patient ID</th> -->
                                    <th>Name</th>
                                    <th>Individual</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Contact #</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr onclick="window.location='{{ route('patient.health-record-history.show', $patient->id) }}';"
                                        style="cursor: pointer;">
                                        <td>{{ $patient->firstname }} {{ $patient->lastname }}</td>
                                        <td>{{ ucfirst($patient->role) }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->address }}</td>
                                        <td>{{ $patient->contact_no }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
