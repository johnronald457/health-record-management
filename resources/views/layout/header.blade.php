<<<<<<< Updated upstream
<div class="main" id="mainContent" style="display: flex; flex-direction: column;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <button class="btn" id="toggleButton">&nbsp; ☰ &nbsp;</button>
        
        <div style="display: flex; align-items: center;">
            @php
                $role = auth()->user()->role;
            @endphp
            
            @if($role === 'nurse' || $role === 'doctor')      
                <a class="text-sm" href="#" style="margin-right: 15px;">Submissions</a>
            @elseif($role === 'teacher' || $role === 'student')
                <a href="#" style="margin-right: 15px;">Create Form</a>
            @endif
            
            <a href="#" style="margin-right: 15px;">Reports</a>
            
            <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #f8595b; cursor: pointer; padding: 7px 0; font-size: 18px;">
                    Logout
                </button>
            </form> -->
        </div>
    </div>
    <hr>
=======
  <!-- Top Navigation -->
  <header class="top-nav">
    <h1 class="mt-2">Health Management System</h1>
    <nav class="nav-links">
      <a href="#">Dashboard</a>
      @php
        $role = auth()->user()->role;
      @endphp
      @if($role === 'nurse' || $role === 'doctor')      
      <a href="{{ route('admin.requests.index')}}">Requests</a>
      @elseif($role === 'teacher' || $role === 'student')
      <a href="#">Request medical</a>
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
>>>>>>> Stashed changes
