<div class="sidenav" id="sidenav">
    <!-- Header for Clinic Department -->
    <h4 class="text-center text-white" style="font-size: 20px;">Clinic Department</h4>
    <br><br>

    <!-- User Profile Info -->
    <div class="d-flex flex-column align-items-center w-100 text-light">
        <img src="{{ asset('img/profile.webp') }}" alt="avatar" class="avatar">
        <br>
        <span><b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</b></span>
        <span class="user-mail">{{ Auth::user()->email }}</span>
        <br>
    </div>

    <div class="container mt-5">
        <!-- Role and Modules Based on User Type -->
        @php
            $role = auth()->user()->role;
        @endphp

        @if($role === 'nurse' || $role === 'doctor')
             
        <div class="container mt-5">
            <div class="dropdownSmsprofile">
                <a class="dropdown-a" href="{{ route('doctor.index') }}" style="text-decoration: none;"><i class='bx bx-grid-alt'></i> Dashboard</a>  
            </div>
            
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-home-smile'></i> Clinic <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    
                <a class="dropdown-a" href="{{ route('admin.patient.index') }}">Student Management</a>
                    <a class="dropdown-a" href="#">Health Record</a>
                    <a class="dropdown-a" href="#">Treatment Management</a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-user'></i> Medical<i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="{{ route('patient.medical-request') }}" style="text-decoration: none;"><span>Request for Medical</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Medical result</span></a>
                    
                </div>
            </div>
        </div>

        @elseif($role === 'teacher' || $role === 'student')
        
        <div class="container mt-5">
            <div class="dropdownSmsprofile">
                <a class="dropdown-a" href="{{ route('patient.index') }}" style="text-decoration: none;"><i class='bx bx-grid-alt'></i> Dashboard</a>  
            </div>
            
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-home-smile'></i> Clinic <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="{{ route('patient.info') }}" style="text-decoration: none;"><span>Student Info</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>My Health Record</span></a>
                    <a class="dropdown-a" href="{{ route('patient.treatment') }}" style="text-decoration: none;"><span>Treatment</span></a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-user'></i> Medical<i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="{{ route('patient.medical-request') }}" style="text-decoration: none;"><span>Request for Medical</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Medical result</span></a>
                    
                </div>
            </div>
            
        </div>
        @endif  

        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="text-align: center;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</div>

<!-- Responsive Sidebar Script -->
<script>    //SideNav
    const toggleButton = document.getElementById('toggleButton');
    const sidenav = document.getElementById('sidenav');
    const mainContent = document.getElementById('mainContent');

    toggleButton.addEventListener('click', () => {
        sidenav.classList.toggle('hidden');
        mainContent.classList.toggle('shift');
    });

    // Dropdown
    function toggleDropdown(button){
    button.classList.toggle("active");
    var dropdownContent = button.nextElementSibling;
    dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
}

    window.onclick = function(event){
        if (!event.target.matches('.dropdown-btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-container");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block"){
                    openDropdown.style.display = "none";
                }
            }
        }
    };


</script>

<style>
    .btn-logout {
        background: none;
        border: none;
        color: #f8595b;
        cursor: pointer;
        padding: 7px 0;
        font-size: 18px;
    }
    
</style>
