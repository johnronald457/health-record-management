@extends('layout.app')

@section('content')

<style>
        #contact {
            font-size: 18px;  /* Adjust the font size */
            font-family: 'Arial', sans-serif;  /* Choose a clear font */
            color: #46474b;  /* Set text color */
            background-color: #c1edff;  /* Background color for marquee */
            padding: 10px 20px;  /* Add padding for spacing */
            border-radius: 5px;  /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  /* Add a subtle shadow */
            width: 100%;  /* Ensure the marquee takes the full width */
            text-align: center;
        }
  /* Main Content */
  .main-content {
    padding: 20px;
  }

  /* KPI Section */
  .kpi-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
  }

  .kpi {
    flex: 1;
    min-width: 250px;
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
    background-color: #E6E6FA;
    border-radius: 15px;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    width: 100%;
    margin: 20px auto;
  }

  .greeting-card img {
    width: 150px;
    height: 150px;
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

  /* Responsive Styles */
  @media (max-width: 768px) {
    .kpi-container {
      flex-direction: column;
    }

    .kpi p {
      font-size: 1.5rem;
    }

    .greeting-card {
      flex-direction: column;
      text-align: center;
    }

    .greeting-card img {
      margin: 0 auto 15px;
    }

    .greeting-text h2 {
      font-size: 1.5rem;
    }

    .greeting-text p {
      font-size: 0.9rem;
    }
  }
</style>

<div class="container main-content">
              <h6 id="contact">
                Hospital contact no.: 09923428141, Barangay contact no.: 0937627624
            </h6>
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
    <!-- Add KPI items here -->
  </div>

<h2 class="mb-4">Upcoming Appointments</h2>

@if($medicals->isEmpty())
    <!-- No Upcoming Appointments Message -->
    <div class="alert alert-info text-center">
        <strong>No upcoming appointments</strong><br>
        It seems you don't have any upcoming medical appointments. Check back later!
    </div>
@else
    @foreach ($medicals as $medical)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><strong>Medical Type:</strong> {{ $medical->request_type }}</h5>
                <p class="card-text"><strong>Schedule Date:</strong> {{ \Carbon\Carbon::parse($medical->schedule_date)->format('l, F j, Y g:i A') }}</p>
            </div>
        </div>
    @endforeach
@endif

    <div>
      <canvas id="myChart"></canvas>
    </div>   

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: @json($months),
        datasets: [{
            label: 'Top reported Disease: {{ $topMedicalCondition }}',
            data: @json($counts),
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
    </script>

@endsection
