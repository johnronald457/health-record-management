<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link re="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <div id="sidenav" class="sidenav">
      <div class="d-flex align-items-center justify-content-between w-100 px-4 mb-5">
          <div class="m-auto">
              <img src="{{ asset('img/logo.png') }}" alt="Logo" class="bcplogo">
          </div>
          <div class="mx-4">
              <a href="#" class="active">
                  <i class='bx bx-bell' style="font-size: 24px;"></i>
              </a>
          </div>
          <div>
              <a href="#">
                  <i class='bx bx-user' style="font-size: 24px;"></i>
              </a>
          </div>
      </div>

        <div class="d-flex flex-column align-items-center w-100 text-light">
            <img src="{{ asset('img/profile.webp') }}" alt="avatar" class="avatar">
            <br>
            <span><b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</b></span>
            <span class="user-mail">{{ Auth::user()->email }}</span>
            <br>
        </div>

      <div class="dropdownCashier">
      @php
        $role = auth()->user()->role;
      @endphp

      @if($role === 'nurse' || $role === 'doctor')               
        <button class="dropdown-btn"> <i class='bx bx-user-circle' ></i>  
          <span>{{ ucfirst(auth()->user()->role) }}</span>
        </button>
      </div>  
      <br>    
        <div class="dropdownCashier">
        <span class="main"><b>CLINIC</b></span><br>
        <span class="sub"><b>Clinic Action</b></span><br><br>
        <button class="dropdown-btn parent-hover"> <i class='bx bx-home-smile' ></i>  
          <span class="droplinks_name">Clinic</span>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a class="dropdown-a" href="{{ route('admin.patient.index')}}"><span class="droplinks_name">Student management</span></a>
          <a class="dropdown-a" href="#"><span class="droplinks_name">Health record</span></a>
          <a class="dropdown-a" href="#"><span class="droplinks_name">Treatment management</span></a>
        </div>

      </div>
      <br>
      <div class="dropdownCashier">
        
        <button class="dropdown-btn"> <i class='bx bx-plus-medical' ></i>  
          <span class="droplinks_name">Medical</span>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a class="dropdown-a" href="medical.html"><span class="droplinks_name">Medical result</span></a>
          
        </div>

      </div>
      @elseif($role === 'teacher' || $role === 'student')       
      <!-- STUDENT MODULES -->         
        <button class="dropdown-btn"> <i class='bx bx-user-circle' ></i>  
          <span>{{ ucfirst(auth()->user()->role) }}</span>
        </button>
      </div>  
      <br>    
        <div class="dropdownCashier">
        <span class="main"><b>CLINIC</b></span><br>
        <span class="sub"><b>Clinic Action</b></span><br><br>
        <button class="dropdown-btn parent-hover"> <i class='bx bx-home-smile' ></i>  
          <span class="droplinks_name">Clinic</span>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a class="dropdown-a" href="{{ route('patient.info') }}"><span class="droplinks_name">Student Info</span></a>
          <a class="dropdown-a" href="{{ route('patient.health-record') }}"><span class="droplinks_name">My Health Record</span></a>
          <a class="dropdown-a" href="{{ route('patient.treatment') }}"><span class="droplinks_name">Treatment</span></a>   
        </div>

      </div>
      <br>
      <div class="dropdownCashier">
        
        <button class="dropdown-btn"> <i class='bx bx-plus-medical' ></i>  
          <span class="droplinks_name">Medical</span>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a class="dropdown-a" href="{{ route('patient.medical-request') }}"><span class="droplinks_name">Request for Medical</span></a>
          <a class="dropdown-a" href="medical.html"><span class="droplinks_name">Medical result</span></a>
          
        </div>

      </div>
      @endif  
    </div>
    <div id="uppernav">
        <div class="upnav">
        <button class="openbtn" onclick="toggleNav()">☰</button>
    </div>

<!---   Haader   --->
@include('layout.header')
<!---   Content   --->
@yield('content')

<!--Medical Information Responsive-->
<script>
  window.addEventListener('resize', function() {
  const screenWidth = window.innerWidth;
  const medicalInfo = document.querySelector('.medical-info');

  // Adjust padding dynamically based on screen width
  if (screenWidth < 768) {
    medicalInfo.style.padding = '15px';
  } else {
    medicalInfo.style.padding = '30px';
  }
});
</script>

<!--Responsive-->
    <script type="text/javascript">
    function toggleNav() {
    const sidenav = document.getElementById("sidenav");
    const uppernav = document.getElementById("uppernav");
    
    
    if (sidenav.style.left === "-280px") {
        sidenav.style.left = "0";
        uppernav.style.marginLeft = "280px";
    } else {
        sidenav.style.left = "-280px";
        uppernav.style.marginLeft = "0";
    }
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "none") {
      dropdownContent.style.display = "block";
    } else {
      dropdownContent.style.display = "none";
    }
  });
}
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
