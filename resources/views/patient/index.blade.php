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
      padding: 20px;
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
  </style>
</head>
<body>


<h2>Dashboard</h2>
  <!-- Main Content -->
  <main class="main-content">
    <!-- KPI Section -->
    <div class="kpi-container">
      <div class="kpi">
        <h3>Total Patients</h3>
        <p>150</p>
      </div>
      <div class="kpi">
        <h3>Appointments Today</h3>
        <p>25</p>
      </div>
      <div class="kpi">
        <h3>Pending Bills</h3>
        <p>5</p>
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