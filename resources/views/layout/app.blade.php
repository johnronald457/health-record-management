<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Bestlink College of the Philippines</title>
    <link rel="icon" type="image/png" href="{{ asset('img/medic_logo.png') }}">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" type="text/css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=close" />
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f8f9fa;
        }
        .sidenav {
            height: 100%;
            width: 275px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            transition: transform 0.3s ease;
            overflow-y: auto; /* Add scroll if content overflows */
            z-index: 1;
        }
        .sidenav.hidden {
            transform: translateX(-100%);
        }

        .sidenav a {
            padding: 10px;
            text-decoration: none;
            font-size: 1rem;
            color: white;
            display: block;
            border-radius: 4px;
            margin-bottom: 5px;
        }
        .sidenav a:hover {
            background-color: #6c757d;
        }
        .main {
            margin-left: 265px;
            padding: 20px;
            transition: margin-left 0.3s ease;
            flex-grow: 1; /* Allow main content to fill space */
        }

        @media (max-width: 565px) {
            .main {
               margin-left: 0;
            }

            .sidenav {
                transform: translateX(-100%);
            }

            .sidenav.hidden {
            transform: translateX(0%);
        }

            #toggleButton {
                display: block;
            }
        }


        .main.shift {
            margin-left: 10px; 
        }
        .box {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-bottom: 20px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        hr {
            margin: 20px 0;
        }
        #toggleButton1 {
            background-color: #495057;
            border: none;
            color: white;
            margin-right: 15px;
            position:absolute;
            left: 1.8em;
        }
        #toggleButton1:hover {
            background-color: #6c757d; 
        }
        .avatar-container {
            margin-bottom: 15px;
            text-align: center; /* Center align avatar */
        }
        .avatar {
            width: 110px;
            height: 110px;
            border-radius: 50%; 
            border: 2px solid white;
        }
        .username {
            font-weight: bold;
            margin: 10px 0 0; 
            color: white;
        }
        .email {
            color: rgb(218, 213, 213);
            margin: 0;
        }
        .nav-links {
            list-style-type: none;
            padding: 0;
        }
        .nav-links li {
            margin: 10px 0;
        }
        .nav-links a i {
            margin-right: 10px;
        }

        .dropdown-container {
            background-color: #343a40; 
            padding: 10px; 
            border-radius: 5px; 
            display: none; 
        }
        
        .role {
            color: white; 
            display: block; 
            text-align: left; 
            padding: 10px 20px;
            font-size: 20px;
        }

        .dropdown-a {
            border-radius:4px;
        }
        .dropdown-a:hover {
            background-color: #495057; 
            color: white;
        }

        .dropdownSmsprofile {
            margin-bottom: 15px; 
            background-color: #343a40;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .dropdown-btn {
            width: 100%; 
            text-align: left;
            padding: 10px; 
            cursor: pointer;
            font-size: 1rem; 
            background-color: #343a40;
            color: white;
            border: none;
            border-radius:4px;
        }

        .dropdown-btn:hover {
            background-color: #6c757d;
        }

        span {
            font-size: 16px;
        }

        .close-btn {
            font-size: 26px;
            font-weight: bold;
            color: ;
            cursor: pointer;
            position: absolute;
            top: 4px;
            right: 6px;
            background:none; 
            border:none; 
            color:#fff; 
            margin-top: .3em;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .close-btn:hover {
            color: #ff0000;
        }

        .close-btn:active {
            transform: scale(0.9);
        }

        
    </style>
</head>
<body>


@include('layout.sidebar')

@include('layout.header')

@yield('content')

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@include('flash_message')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    // SideNav
    const toggleButton = document.getElementById('toggleButton');
    const toggleButton1 = document.getElementById('toggleButton1');
    const sidenav = document.getElementById('sidenav');
    const mainContent = document.getElementById('mainContent');

    toggleButton.addEventListener('click', () => {
        sidenav.classList.toggle('hidden');
        mainContent.classList.toggle('shift');
    });

    toggleButton1.addEventListener('click', () => {
        sidenav.classList.toggle('hidden');
        mainContent.classList.toggle('shift');
    });

    // Dropdown
    function toggleDropdown(button) {
        button.classList.toggle("active");
        var dropdownContent = button.nextElementSibling;
        dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-container");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    };

    
</script>
</body>
</html>