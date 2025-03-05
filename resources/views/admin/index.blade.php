@extends('layout.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clinic Dashboard</title>
        <style>
            /* KPI Section */
            .kpi-container {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }

            .kpi {
                flex: 1;
                padding: 15px;
                background-color: #fff;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                text-align: center;
            }

            .kpi h3 {
                font-size: 1.2rem;
                color: #555;
            }

            .kpi p {
                font-size: 1.8rem;
                font-weight: bold;
                color: #007bff;
            }

            @media (max-width: 768px) {
                .kpi-container {
                    grid-template-columns: 1fr;
                    gap: 15px;
                }
            }


            @media (max-width: 767px) {
                .kpi-container {
                    flex-direction: column;
                }

                .kpi-container .kpi {
                    margin-bottom: 15px;
                }
            }

            /* Module Styles */
            .module {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                margin-top: 20px;
            }

            .module h2 {
                color: #2a3d66;
                margin-bottom: 15px;
            }

            /* Greeting Card Styles */
            .greeting-card {
                background-color: #E6E6FA;
                border-radius: 15px;
                padding: 20px;
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                width: 100%;
                margin: 20px auto;
                z-index: -1;
            }

            .greeting-card img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                margin-right: 20px;
            }

            .greeting-card p {
                color: #666;
                font-size: 14px;
                margin-top: 5px;
            }

            @media (max-width: 768px) {

                .kpi p {
                    font-size: 1.5rem;
                }

                .greeting-card {
                    width: 100%;
                }

                .greeting-card p,
                .wc h2,
                h4 {
                    flex-direction: column;
                    text-align: center;
                }

                .greeting-card img {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
                    margin-right: 20px;
                }

                .greeting-card img {
                    margin: 0 auto 15px;
                }

                .greeting-card h4 {
                    font-size: 1.5rem;
                }

                .greeting-card p {
                    font-size: 0.9rem;
                }
            }
        </style>
    </head>

    <body>
        <div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-12">
                    <div class="card greeting-card p-4 d-flex align-items-center flex-md-row text-center text-md-start">
                        <!-- Image Avatar -->
                        <img src="{{ asset('img/doctor.webp') }}" alt="Doctor Avatar" ">

                                                                              <!-- Greeting Text -->
                                                                              <div class="wc">
                                                                                <h2 class="display-6 mb-1">Good day!</h2>
                                                                                <h4 class="text-danger mb-1">Doctor {{ Auth::user()->firstname }}</h4>
                                                                                <p class="mb-0 text-muted">Caring for Every Life, Committed to Excellence.</p>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                        </div>


                                                                            <!-- KPI Section -->
                                                                             
                                                                            <div class="kpi-container">
                                                                              <div class="kpi">
                                                                                <h3>Total Patients</h3>
                                                                                <p>{{ $totalPatients }}</p>
                                                                              </div>
                                                                              <div class="kpi">
                                                                                <h3>Total Nurses</h3>
                                                                                <p>{{ $totalNurses }}</p>
                                                                              </div>
                                                                              <div class="kpi">
                                                                                <h3>Medical Requests</h3>
                                                                                <p>11</p>
                                                                              </div>
                                                                            </div>

                                                                                <!-- Additional Modules -->
                                                                            <div class="module">
                                                                              <h2>Upcoming Appointments</h2>
                                                                     @if ($medicals->where('status', 'done')->isEmpty())
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
                                        <th class="text-center">Attachment</th>
                                        <th class="text-center">Comments</th>
                                        <!-- <th>Doctor name</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicals as $medical)
                                        <tr style="cursor: {{ $medical->status == 'pending' ? 'not-allowed' : 'pointer' }};"
                                            onclick="{{ $medical->status == 'pending' ? 'event.preventDefault();' : 'window.location=\'' . route('admin.requests.show', $medical->id) . '\';' }}">
                                            <td class="text-center">{{ $medical->patient->firstname }}
                                                {{ $medical->patient->lastname }}</td>
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
                                            <td class="text-center"
                                                style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                @if ($medical->file_path)
                                                    <a href="{{ asset($medical->file_path) }}" target="_blank"
                                                        title="{{ $medical->file_path }}">
                                                        {{ ucfirst(basename($medical->file_path)) }}
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td class="text-center">{{ ucfirst($medical->description ?? 'N/A') }}</td>
                                            <!-- <td>{{ $medical->doctor_name ?? 'N/A' }}</td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No upcoming appointments found.</p>
                        @endif
                    </div>
                    <!-- Additional Modules -->
                    <div class="module">
                        <h2>Patient Records</h2>
                        <p>Display patient records here...</p>
                    </div>
                </div>
    </body>

    </html>
@endsection
