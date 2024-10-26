@extends('layout.app')

@section('content')

<div class="shadow mb-4 w-full p-5">
    <div class="card-header">
        <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <h1 class="display-6 fw-bolder text-uppercase">Users</h1>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Patients</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $patients->count() }}</div>

                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-user-gear fa-4x text-gray-500 pr-3"></i>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table  px-1">
                <table class="table table-striped table-hover" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-secondary">
                            <!-- <th>Patient ID</th> -->
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Email</th>
                            <th>Contact #</th>
                            <th>Emergency #</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <!-- <td>{{ $patient->id }}</td> -->
                                <td>{{ $patient->firstname }} {{ $patient->lastname }}</td>
                                <td>{{ $patient->sex }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ $patient->contact_no }}</td>
                                <td>{{ $patient->emergency_contact }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>
                                <button class="btn btn-primary btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <form action="{{ route('admin.patient.destroy', $patient) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn" data-toggle="modal" data-target="#deleteUserModal{{$patient->id}}"><i class="fas fa-trash text-white"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
