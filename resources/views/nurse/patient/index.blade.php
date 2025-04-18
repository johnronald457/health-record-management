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
                            <strong>Total:</strong>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $patients->count() }}</div>
                    </div>
                    {{-- Search bar --}}
                    <x-searchBar placeholder="Search patients..." />
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
                    <tbody id="patientTableBody">
                        @foreach ($patients as $patient)
                            <tr onclick="window.location='{{ route('nurse.patients.show', $patient->id) }}';"
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //Search
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: "/nurse/patients/search",
                type: 'GET',
                data: {
                    search: query
                },
                success: function(data) {
                    let tableBody = $('#patientTableBody');
                    let patientCount = $('#patientCount');
                    tableBody.empty();

                    if (data.length > 0) {
                        $.each(data, function(index, patient) {
                            let row = `<tr onclick="window.location='patients/${patient.id}';" style="cursor: pointer;">
                                    <td>${patient.firstname} ${patient.lastname}</td>
                                    <td>${patient.role.charAt(0).toUpperCase() + patient.role.slice(1)}</td>
                                    <td>${patient.email}</td>
                                    <td>${patient.address}</td>
                                    <td>${patient.contact_no}</td>
                                </tr>`;
                            tableBody.append(row);
                        });
                        patientCount.text(data.length);
                    } else {
                        tableBody.append(
                            '<tr><td colspan="5" class="text-center text-muted">No patients found.</td></tr>'
                        );
                        patientCount.text('0');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                }
            });
        });
    });
</script>
