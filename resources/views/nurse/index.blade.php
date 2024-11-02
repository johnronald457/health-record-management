@extends('layout.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clinic Dashboard</title>
  <style>

    /* Main Content */
    .main-content {
      padding: 14px;
    }

    /* KPI Section */
    .kpi-container {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-top: 20px;
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
      color: #2a3d66;
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
      background-color: #E6E6FA; /* Light purple background */
      border-radius: 15px;
      padding: 20px;
      display: flex;
      align-items: center;
      width: 100%;
      margin: 20px auto;
    }

    .greeting-card img {
      width: 170px;
      height: 170px;
      border-radius: 50%;
      margin-right: 20px;
    }

    .greeting-text {
      font-size: 18px;
    }

    .greeting-text h5 {
      color: #333;
    }

    .greeting-text .name {
      color: red;
      font-weight: bold;
    }

    .greeting-text p {
      color: #666;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  
  <!-- Main Content -->
  <main class="container main-content">
    
<div class="row justify-content-center">
  <div class="col-md-8 col-lg-12">
    <div class="card greeting-card p-4 d-flex align-items-center flex-md-row text-center text-md-start">
      <!-- Image Avatar -->
      <img src="{{ asset('img/doctor.webp') }}" alt="Doctor Avatar" class="rounded-circle me-md-4 mb-3 mb-md-0" style="width: 125px; height: 125px; object-fit: cover;">

      <!-- Greeting Text -->
      <div >
        <h2 class="display-6 mb-1">Good day!</h2>
        <h4 class="text-danger mb-1">Nurse {{ Auth::user()->firstname }}</h4>
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

    <!-- Modules (Example: Appointments) -->
    <div class="module">
      <h2>Upcoming Appointments</h2>
      <p>Display upcoming appointments here...</p>
    </div>
    
    <!-- Additional Modules -->
    <div class="module">
      <h2>Patient Records</h2>
      <p>Display patient records here...</p>
    </div>
  </main>
</body>
</html>


@endsection