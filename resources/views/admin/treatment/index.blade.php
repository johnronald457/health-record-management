@extends('layout.app')

@section('content')
    <div class="shadow mb-4 w-full p-3 p-m-5">
        <div class="card-header">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <h1 class="display-6 fw-bolder text-uppercase">treatments</h1>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <strong>Total:</strong>
                            </div>
                            <div class="h5 ms-1 mb-1.5 font-weight-bold text-gray-800" id="patientCount">
                                {{ $treatments->count() }}</div>
                        </div>
                        {{-- Search bar --}}
                        <x-searchBar placeholder="Search..." />
                    </div>
                    {{-- <div class="col-auto">
                    <i class="fas fa-solid fa-user-gear fa-4x text-gray-500 pr-3"></i>
                </div> --}}
                </div>
            </div>
            <div class="">

                <div class="table table-responsive">
                    <table class="table table-hover" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="table-light ">
                                <!-- <th>Patient ID</th> -->
                                <th>Name</th>
                                <th>Health history</th>
                                <th>Allergies</th>
                                <th>Symptoms</th>
                                <th>Blood Pressure</th>

                            </tr>
                        </thead>
                        <tbody id="patientTableBody">
                            @foreach ($treatments as $treatment)
                                <tr onclick="window.location='{{ route('admin.treatment.show', $treatment->id) }}';"
                                    style="cursor: pointer;">
                                    <td>{{ $treatment->user->firstname }} {{ $treatment->user->lastname }}</td>
                                    <td>{{ ucfirst($treatment->health_assessment->medical_history) }}</td>
                                    <td>{{ $treatment->health_assessment->allergies }}</td>
                                    <td>{{ $treatment->health_assessment->symptoms }}</td>
                                    <td>{{ $treatment->health_assessment->blood_pressure }}</td>
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
    $(document).ready(function() {
        let timer = null; // Debounce timer

        $('#searchInput').on('keyup', function() {
            clearTimeout(timer); // I-clear ang previous timer
            let query = $(this).val().trim();

            timer = setTimeout(() => {
                $.ajax({
                    url: "/doctor/treatments/search", // Adjust based on your route
                    type: 'GET',
                    data: {
                        search: query
                    },
                    success: function(data) {
                        let tableBody = $('#treatmentTableBody');
                        tableBody.empty();

                        if (data.length > 0) {
                            $.each(data, function(index, treatment) {
                                let patientName = treatment.user ?
                                    `${treatment.user.firstname} ${treatment.user.lastname}` :
                                    'Unknown';
                                let medicalHistory = treatment
                                    .health_assessment?.medical_history ||
                                    'N/A';
                                let allergies = treatment.health_assessment
                                    ?.allergies || 'N/A';
                                let symptoms = treatment.health_assessment
                                    ?.symptoms || 'N/A';
                                let bloodPressure = treatment
                                    .health_assessment?.blood_pressure ||
                                    'N/A';

                                let treatmentUrl = encodeURI(
                                    `/treatment/${treatment.id}`);

                                let row = `<tr onclick="window.location='${treatmentUrl}';" style="cursor: pointer;">
                                        <td>${patientName}</td>
                                        <td>${medicalHistory}</td>
                                        <td>${allergies}</td>
                                        <td>${symptoms}</td>
                                        <td>${bloodPressure}</td>
                                    </tr>`;
                                tableBody.append(row);
                            });
                        } else {
                            tableBody.append(
                                '<tr><td colspan="5" class="text-center text-muted">No treatments found.</td></tr>'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', status, error);
                    }
                });
            }, 300); // 300ms debounce
        });
    });
</script>
