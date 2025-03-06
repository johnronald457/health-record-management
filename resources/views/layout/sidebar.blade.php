<div class="sidenav" id="sidenav">
    <!-- Header for Clinic Department -->
    <button class="close-btn" id="toggleButton">
        <span class="material-symbols-outlined">
            <i class="fas fa-bars fa-xs"></i>
        </span>
    </button>
    <h3 class="text-center text-white mt-1" style="font-size: 18px; padding-right: 1em;">Clinic Department</h3>

    <br><br>


    <!-- Role and Modules Based on User Type -->
    @php
        $role = auth()->user()->role;
    @endphp
    <!-- User Profile Info -->
    <div class="d-flex flex-column align-items-center w-100 text-light">
        @if ($role === 'nurse' || $role === 'doctor')
            <img src="{{ asset('img/medic_logo.png') }}" alt="avatar" class="avatar">
        @elseif($role === 'teacher' || $role === 'student')
            <img src="{{ asset('img/profile.webp') }}" alt="avatar" class="avatar">
        @elseif($role === 'head')
            <img src="{{ asset('img/profile.webp') }}" alt="avatar" class="avatar">
        @endif
        <br>
        <span><b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</b></span>
        <span class="user-mail">{{ Auth::user()->email }}</span>
        <br>
    </div>

    <div class="container mt-5">


        @if ($role === 'doctor')
            <div class="container mt-5">
                <div class="dropdownSmsprofile">
                    <a class="dropdown-a" href="{{ route('doctor.index') }}" style="text-decoration: none;"><i
                            class='bx bx-grid-alt'></i> Dashboard</a>
                </div>

                <div class="dropdownSmsprofile">
                    <button class="dropdown-btn" onclick="toggleDropdown(this)">
                        <i class='bx bx-home-smile'></i> Clinic <i class="fa fa-caret-down" style="float: right;"></i>
                    </button>
                    <div class="dropdown-container">

                        <a class="dropdown-a" href="{{ route('admin.patient.index') }}">Patients Management</a>
                        <a class="dropdown-a" href="{{ route('admin.health-record.index') }}">Health Record</a>
                        <a class="dropdown-a" href="{{ route('admin.treatment.index') }}">Treatment Management</a>
                    </div>
                </div>

                <div class="dropdownSmsprofile">
                    <button class="dropdown-btn" onclick="toggleDropdown(this)">
                        <i class='bx bx-user'></i> Medical<i class="fa fa-caret-down" style="float: right;"></i>
                    </button>
                    <div class="dropdown-container">
                        <a class="dropdown-a" href="{{ route('admin.requests.index') }}"
                            style="text-decoration: none;"><span>Medical Input</span></a>

                    </div>
                </div>
            </div>
        @elseif($role === 'nurse')
            <div class="container mt-5">
                <div class="dropdownSmsprofile">
                    <a class="dropdown-a" href="{{ route('nurse.index') }}" style="text-decoration: none;"><i
                            class='bx bx-grid-alt'></i> Dashboard</a>
                </div>

                <div class="dropdownSmsprofile">
                    <button class="dropdown-btn" onclick="toggleDropdown(this)">
                        <i class='bx bx-home-smile'></i> Clinic <i class="fa fa-caret-down" style="float: right;"></i>
                    </button>
                    <div class="dropdown-container">

                        <a class="dropdown-a" href="{{ route('nurse.patient.index') }}">Student Management</a>
                        <a class="dropdown-a" href="#">Health Record</a>
                        <a class="dropdown-a" href="{{ route('nurse.treatment.index') }}">Treatment Management</a>
                    </div>
                </div>

                <div class="dropdownSmsprofile">
                    <button class="dropdown-btn" onclick="toggleDropdown(this)">
                        <i class='bx bx-user'></i> Medical<i class="fa fa-caret-down" style="float: right;"></i>
                    </button>
                    <div class="dropdown-container">
                        <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Medical
                                input</span></a>

                    </div>
                </div>
            </div>
        @elseif($role === 'head')
            <div class="container mt-5">
                {{-- <div class="dropdownSmsprofile">
                    <a class="dropdown-a" href="{{ route('head.index') }}" style="text-decoration: none;"><i
                            class='bx bx-grid-alt'></i> Dashboard</a>
                </div> --}}

                <div class="dropdownSmsprofile">
                    <a class="dropdown-a" href="{{ route('head.confidential-result.index') }}"
                        style="text-decoration: none;"><span>Confidential Result</span></a>
                </div>
            </div>
        @elseif($role === 'teacher' || $role === 'student')
            <div class="container mt-5">
                <div class="dropdownSmsprofile">
                    <a class="dropdown-a" href="{{ route('patient.index') }}" style="text-decoration: none;"><i
                            class='bx bx-grid-alt'></i> Dashboard</a>
                </div>

                <div class="dropdownSmsprofile">
                    <button class="dropdown-btn" onclick="toggleDropdown(this)">
                        <i class='bx bx-home-smile'></i> Clinic <i class="fa fa-caret-down" style="float: right;"></i>
                    </button>
                    <div class="dropdown-container">
                        <a class="dropdown-a" href="{{ route('patient.info') }}"
                            style="text-decoration: none;"><span>Student Info</span></a>
                        <a class="dropdown-a" href="{{ route('patient.health-record') }}"
                            style="text-decoration: none;"><span>My Health Record</span></a>
                        <a class="dropdown-a" href="{{ route('patient.treatment') }}"
                            style="text-decoration: none;"><span>Treatment</span></a>
                    </div>
                </div>

                <div class="dropdownSmsprofile">
                    <button class="dropdown-btn" onclick="toggleDropdown(this)">
                        <i class='bx bx-user'></i> Medical<i class="fa fa-caret-down" style="float: right;"></i>
                    </button>
                    <div class="dropdown-container">
                        <a class="dropdown-a" href="{{ route('patient.medical-result') }}"
                            style="text-decoration: none;"><span>Medical result</span></a>

                    </div>
                </div>

            </div>
        @endif

        <button type="button" style="text-align: center; width: 100%;" class="btn-logout" data-bs-toggle="modal"
            data-bs-target="#logoutModal">Logout</button>

    </div>
</div>
@include('auth.logoutConfirmationModal')
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
