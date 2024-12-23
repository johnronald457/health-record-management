@extends('layout.app')

@section('content')
<div class="shadow mb-4 w-full p-3 p-m-5">
    <div class="card-header">
        <div class="row no-gutters align-items-center">
                <!-- <div class="col mr-0"> -->
                <h1 class="display-6 fw-bolder text-uppercase">Patients</h1>

                <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <strong>Total:</strong></div>
                <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $patients->count() }}</div>
                </div>
                <!-- <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search patient by name...">
    </div> -->
                </div>

                <!-- <div class="col-auto"> -->
                    <i class="fas fa-solid fa-user-gear fa-4x text-gray-500 pr-3"></i>
                </div>
            <!-- </div> -->
        </div>
        <div class="">

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
                        @foreach($patients as $patient)
                            <tr onclick="window.location='{{ route('nurse.patients.show', $patient->id) }}';" style="cursor: pointer;">
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
@endsection
