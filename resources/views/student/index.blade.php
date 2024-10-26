@extends('layout.app')

@section('content')

  <!-- Top Navigation -->
  <header class="top-nav">
    <h1>Clinic Dashboard</h1>
    <nav class="nav-links">
      <a href="#">Dashboard</a>
      <a href="#">Appointments</a>
      <a href="#">Patients</a>
      <a href="#">Doctors</a>
      <a href="#">Billing</a>
      <a href="#">Reports</a>
    </nav>
  </header>

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
  
@endsection