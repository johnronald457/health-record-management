  <!-- Top Navigation -->
  <header class="top-nav">
    <h1>Health Management System</h1>
    <nav class="nav-links">
      <a href="#">Dashboard</a>
      <a href="#">Appointments</a>
      <a href="#">Patients</a>
      <a href="#">Doctors</a>
      <a href="#">Billing</a>
      <a href="#">Reports</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" style="background: none; border: none; color: #f8595b; cursor: pointer; padding-top:7px; padding-bottom:7px; font-size: 18px;">
            Logout
        </button>
    </form>
    </nav>
  </header>