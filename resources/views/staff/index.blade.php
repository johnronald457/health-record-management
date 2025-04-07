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
                                <h4 class="text-danger mb-1">Staff {{ Auth::user()->firstname }}</h4>
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
                            <h2 class="mt-4 mb-3">Under Review</h2>

                             @if ($medicals->isEmpty())
                        <!-- No Upcoming Appointments Message -->
                        <div class="alert alert-info text-center">
                            <strong>No Pending Conditions Awaiting Evaluation</strong><br>
                            You currently don't have any conditions awaiting evaluation. Please check back later for updates
                            as your medical records are reviewed.
                        </div>
                    @else
                        @foreach ($medicals as $medical)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Medical Type:</strong> {{ $medical->request_type }}</h5>
                                    <p class="card-text"><strong>Schedule Date:</strong>
                                        {{ \Carbon\Carbon::parse($medical->schedule_date)->format('l, F j, Y g:i A') }}</p>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
    </body>

    </html>
@endsection
