@extends('layout.app')

@section('content')

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

<div class="container main-content">
  
  <!-- Full-Width Greeting Card Section -->
  <div class="row">
    <div class="col-12">
      <div class="greeting-card d-flex align-items-center">
        <!-- Image Avatar -->
        <img src="{{ asset('img/doctor-avatar.png') }}" alt="Doctor Avatar">
        <!-- Greeting Text -->
        <div class="greeting-text ms-3">
          <h2>Good Day! <text class="text-danger"> {{ $fullName }}</text></h2>
          <p>Approach everything you do with determination and focus. Prioritize your health, pursue activities with passion,
             and always strive to do your best <br> —it all contributes to a balanced and fulfilling life.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- KPI Section -->
  <div class="kpi-container">
    <!-- <div class="kpi">
      <h3>Appointments Today</h3>
      <p>1</p>
    </div> -->
    <!-- <div class="kpi">
      <h3>Pending Bills</h3>
      <p>5</p>
    </div> -->
  </div>

  <!-- Modules Section -->
  <div class="module">
    <h2>Upcoming Appointments</h2>
    <p>Display upcoming appointments here...</p>
    <!-- for requested for medical -->
  </div>

  <div class="module">
    <h2>Patient Records</h2>
    <p>Display patient records here...</p>
    <!-- history of medical or latest medical -->
  </div>

</div>

@endsection
