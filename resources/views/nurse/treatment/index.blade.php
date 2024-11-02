@extends('layout.app')

@section('content')

<div class="shadow mb-4 w-full p-5">
    <div class="card-header">
        <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <h1 class="display-6 fw-bolder text-uppercase">Treatments</h1>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $treatments->count() }}</div>

                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-user-gear fa-4x text-gray-500 pr-3"></i>
                </div>
            </div>
        </div>
        <div class="">

            <div class="table">
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
                    <tbody>
                        @foreach($treatments as $treatment)
                            <tr onclick="window.location='{{ route('nurse.treatment.show', $treatment->id) }}';" style="cursor: pointer;">
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
