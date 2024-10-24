<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link re="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <div id="sidenav" class="sidenav">
        <img src="{{ asset('img/logo.png') }}" alt="img" class="bcplogo">
        <ul class="nav-link">
            <li class="bellNotiff">
            <a href="#" class="active">
                <i class='bx bx-bell'></i>
            </a>
            </li>
            <li class="userProfile">
            <a href="#">
                 <i class='bx bx-user'></i>
            </a>
            </li>
            <img src="{{ asset('img/profile.webp') }}" alt="avatar" class="avatar"><br><br>
            <table class="user-profile">
              <tr>
                <td><span class="user-name"><b>Juan Dela cruz</b></span></td>
              </tr>
              <tr>
                  <td> <span class="user-mail">20156548@bcp.edu.ph</span></td>    
              </tr>
            </table>        
        </ul><br>

        

        <div class="dropdownCashier">
        <span class="main"><b>CLINIC</b></span><br>
        <span class="sub"><b>Clinic Action</b></span><br><br>
        <button class="dropdown-btn"> <i class='bx bx-plus-medical' ></i>  
          <span class="droplinks_name">Clinic</span>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a class="dropdown-a" href="#"><span class="droplinks_name">Student management</span></a>
          <a class="dropdown-a" href="#"><span class="droplinks_name">Health record</span></a>
          <a class="dropdown-a" href="#"><span class="droplinks_name">Treatment management</span></a>
          
          
        </div>

      </div>

      <div class="dropdownCashier">
        
        <button class="dropdown-btn"> <i class='bx bx-plus-medical' ></i>  
          <span class="droplinks_name">Medical</span>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a class="dropdown-a" href="medical.html"><span class="droplinks_name">Medical result</span></a>
          
        </div>

      </div>

 
              <!--Medical-->
           
    </div>
    <div id="uppernav">
        <div class="upnav">
        <button class="openbtn" onclick="toggleNav()">☰</button>
    </div>
<!---   Conent   --->
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
</body>
</html>
