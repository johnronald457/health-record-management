  <!-- Top Navigation -->
  <header class="top-nav">
    <h1 class="mt-2">Health Management System</h1>
    <nav class="nav-links">
      <a href="#">Dashboard</a>
      @php
        $role = auth()->user()->role;
      @endphp
      @if($role === 'nurse' || $role === 'doctor')      
      <a href="#">Submissions</a>
      @elseif($role === 'teacher' || $role === 'student')
      <a href="#">Create Form</a>
      @endif
      <a href="#">Reports</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" style="background: none; border: none; color: #f8595b; cursor: pointer; padding-top:7px; padding-bottom:7px; font-size: 18px;">
            Logout
        </button>
    </form>
    </nav>
  </header>