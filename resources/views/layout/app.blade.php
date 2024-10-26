<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Bestlink College of the Philippines</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="{{ asset('css/student-style.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">


    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    
  </head>
  <style>
/*     
    /* Top Navigation */
    .top-nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #0e1c6bf1;
      color: #fff;
      padding: 10px 20px;
      box-shadow:0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .top-nav h1 {
      font-size: 1.5rem;
    }

    .nav-links {
      display: flex;
      gap: 15px;
    }

    .nav-links a {
      color: #b0c4de;
      text-decoration: none;
      padding: 8px;
      transition: color 0.3s;
    }

    .nav-links a:hover {
      color: #fff;
    } */
  </style>
  <body>
  	@include('layout.sidebar')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script src="{{ asset('js/data-table.js') }}"></script>
  </body>
</html>