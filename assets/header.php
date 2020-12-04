<?php
include 'lib/Database.php'; 
include 'lib/Session.php'; 
include 'lib/helper.php'; 
include 'mycookie.php';
Session::init();
$stu_name = Session::get('name');
$stu_mobile = Session::get('mobile');
$stu_email = Session::get('email');
$stu_id = Session::get('stu_id');

$db = new Database();
$hp = new Helper();
$user_ip = $hp->getUserIP();


if (isset($_GET['logout'])) {
  Session::destroy();
  //echo "<script>window.location = 'index.php';</script>";
}

//Data for visitor
$visit_time = date('Y-m-d-h-i-sa');
$path = $_SERVER['SCRIPT_FILENAME'];
  $currentpage = basename($path, '.php');
  $visitor_email = Session::get('email')? Session::get('email'):"Unknown";
$audit_quiry = "INSERT INTO tbl_visitor (email, visitor_ip, visit_time, visit_page) VALUES('$visitor_email', '$user_ip', '$visit_time', '$currentpage')";
$db->INSERT($audit_quiry);


?>
<html lang="en">
<head>
  <title>IIT, DU - Highest Echelon of Software Engineering in Bangladesh </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/mystyle.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/myjs.js"></script>
  <link rel="img/logo_du.jpg" type="image/x-icon">
	<link rel="icon" href="img/logo_du.jpg" type="image/x-icon">
  
</head>
<body>
	<div class="container-fluid" id="container" >
		<div id="marquee">
			<marquee onmouseover="this.stop();" onmouseout="this.start();">Online National Event <a href="https://fb.me/e/1EwY6YwnU" target="_blank" style="color:blue">ITverse</a>  is scheduled to be organized by IITSEC on 13-21 November </marquee>
		</div>
<div class="loginmanu " >

  <ul class="pull-right list-group list-group-horizontal float-right">
  
<?php if(Session::get("login")== "true"){ ?>
    <li  class="list-group-item">
        <a href='index.php'>Hi! <?php echo Session::get("name");?></a>
    </li>
        <li  class="list-group-item">
      <a href='profile.php'>PROFILE</a>
    </li>
    <li  class="list-group-item">
      <a href='index.php?logout=true'> LOGOUT</a>
    </li>
<?php }else{  ?>
    <li  class="list-group-item">
<a href='' data-toggle="modal" data-target="#myModal"> LOGIN</a>
    </li>
<?php } ?>
    <li  class="list-group-item">
      <a href=""> HELP</a>
    </li>
  </ul>
</div>
		



<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light black-color">
  <!-- Navbar brand -->
 
  <img src="img/logo_iit.jpg" width="100px">
  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <!-- Links -->
    <ul class="navbar-nav mr-auto">
     <li style="width: 20px">  </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>     
     
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">ABOUT IIT
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">ACADEMIC
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">NOTICES
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">LIFE IN IIT
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

     
       <li class="nav-item">
        <a class="nav-link" href="#">RESEARCH</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="contact.php">CONTACT</a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">SITE MAP
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>

<div>
					

</div>

   
  </div>
  <img src="img/logo_du.jpg" width="55px">
  <!-- Collapsible content -->
</nav>
<!--/.Navbar-->














		<div class="row  text-center">	
			<div class="col-sm-12" id="mainbody" >
				