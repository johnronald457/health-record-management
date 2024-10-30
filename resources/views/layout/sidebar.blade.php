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
            <!-- Nurse/Doctor Modules -->
            <!-- <div class="dropdownSmsprofile">
                <button class="dropdown-btn">
                    <i class='bx bx-user-circle'></i> <span>{{ ucfirst($role) }}</span>
                </button>
            </div> -->
            <!-- <br> -->

            <!-- Clinic Dropdown -->
            <div class="dropdownSmsprofile">
                <span class="main"><b>CLINIC</b></span><br>
                <button class="dropdown-btn parent-hover">
                    <i class='bx bx-home-smile'></i> <span>Clinic</span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="{{ route('admin.patient.index') }}">Student Management</a>
                    <a class="dropdown-a" href="#">Health Record</a>
                    <a class="dropdown-a" href="#">Treatment Management</a>
                </div>
            </div>
            <!-- <br> -->

            <!-- Medical Dropdown -->
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn">
                    <i class='bx bx-plus-medical'></i> <span>Medical</span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="medical.html">Medical Result</a>
                </div>
            </div>

        @elseif($role === 'teacher' || $role === 'student')
            <!-- Teacher/Student Modules -->
            <!-- <div class="dropdownSmsprofile">
                <button class="dropdown-btn">
                    <i class='bx bx-user-circle'></i> <span>{{ ucfirst($role) }}</span>
                </button>
            </div> -->
            <!-- <br> -->
            
            <!-- Dashboard Link -->
            <div class="dropdownSmsprofile">
                <a class="dropdown-a" href="#"><i class='bx bx-grid-alt'></i> Dashboard</a>
            </div>

            <!-- Clinic Dropdown for Students/Teachers -->
            <div class="dropdownSmsprofile">
                <span class="main"><b>CLINIC</b></span><br>
                <button class="dropdown-btn parent-hover">
                    <i class='bx bx-home-smile'></i> <span>Clinic</span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="{{ route('patient.info') }}">Student Info</a>
                    <a class="dropdown-a" href="{{ route('patient.health-assessment') }}">My Health Record</a>
                    <a class="dropdown-a" href="{{ route('patient.treatment') }}">Treatment</a>
                </div>
            </div>
            <!-- <br> -->

            <!-- Medical Dropdown -->
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn">
                    <i class='bx bx-plus-medical'></i> <span>Medical</span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="{{ route('patient.medical-request') }}">Request for Medical</a>
                    <a class="dropdown-a" href="medical.html">Medical Result</a>
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
<script>
    window.addEventListener('resize', function() {
        const screenWidth = window.innerWidth;
        const medicalInfo = document.querySelector('.medical-info');
        medicalInfo.style.padding = screenWidth < 768 ? '15px' : '30px';
    });

    function toggleNav() {
        const sidenav = document.getElementById("sidenav");
        const uppernav = document.getElementById("uppernav");

        sidenav.style.left = sidenav.style.left === "-280px" ? "0" : "-280px";
        uppernav.style.marginLeft = sidenav.style.left === "0" ? "280px" : "0";
    }

    document.querySelectorAll(".dropdown-btn").forEach(button => {
        button.addEventListener("click", function() {
            this.classList.toggle("active");
            const dropdownContent = this.nextElementSibling;
            dropdownContent.style.display = dropdownContent.style.display === "none" ? "block" : "none";
        });
    });
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
