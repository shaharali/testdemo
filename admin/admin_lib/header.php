<?php 
include '../lib/Database.php'; 
include 'admin_lib/admin_session.php'; 
include 'admin_lib/admin_cookie.php';
$db = new Database();
AdminSession::checkSession();

$admin_email = AdminSession::get("admin_email"); 
$admin_user_id = AdminSession::get("user_id");  
$admin_name = AdminSession::get("admin_name"); 
$admin_level = AdminSession::get("admin_level"); 

if(isset($_GET['admin_logout'])) {
  AdminSession::set("admin_login",false);
  AdminSession::destroy();
  echo "<script>window.location = 'login.php';</script>";
}

?>
<html lang="en">
<head>
  <title>IIT, DU - Highest Echelon of Software Engineering in Bangladesh </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/mystyle.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/myjs.js"></script>
  <link rel="../img/logo_du.jpg" type="image/x-icon">
	<link rel="icon" href="../img/logo_du.jpg" type="image/x-icon">
  <style type="text/css">
    body{     
      background-image: url('../img/du_logo.jpg');
      
       background-repeat: no-repeat;  
        background-position: top;
        animation: mymove 50s infinite;
      }
      @keyframes mymove {
  50% {background-position: center;}
}
  </style>
</head>
<body>
	<div class="container-fluid" id="container" >
		
<div class="admin-loginmanu" >
  <h2 style="text-align: center ;" class="text-dark">ADMIN PANEL</h1>
</div>
		



<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light black-color admin-nav">
  <!-- Navbar brand -->
 <h1>IIT</h1>
  <!--
  <img src="../img/logo_iit.jpg" width="80px">
-->
  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      
       <li class="nav-item active">
        <a class="nav-link" href="index.php">JOB LIST
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">ADMIN
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="nav-link" href="users.php">ALL USERS</a>
          <a class="nav-link" href="add_user.php">ADD USER</a>
          <a class="nav-link" href="change_pass.php">CHANGE PASS</a>
        </div>
      </li> 
      
      <li class="nav-item">
        <a class="nav-link" href="messages.php">MESSAGES</a>
      </li>     
      <li class="nav-item">
        <a class="nav-link" href="sessions.php">SESSIONS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="visitors.php">VISITORS</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="?admin_logout=true">LOGOUT</a>
      </li>
      
    </ul>


<div>
					

</div>

   
  </div>
  <p>User : <b> <?php echo AdminSession::get("user_id");  ?></b> </p>
    <!--
  <img src="../img/logo_du.jpg" width="55px">
-->
  <!-- Collapsible content -->
</nav>
<!--/.Navbar-->














		<div class="row  text-center">	
			<div class="col-sm-12" id="mainbody" >
				