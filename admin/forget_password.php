<?php 
include '../lib/Database.php'; 
$db = new Database();
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
  <h2 style="text-align: center ;" class="text-danger">ADMIN PANEL</h1>
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
<div>
</div>
  </div>
</nav>
<!--/.Navbar-->

		<div class="row  text-center">	
			<div class="col-sm-12" id="mainbody" >

<hr style="color: black">
<?php
 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {  
         $url = "https://";   
   } else{  
         $url = "http://";   
     }
$url = "http://";      
$url.= $_SERVER['HTTP_HOST'];     
$url.= $_SERVER['REQUEST_URI'];  

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$to = $_POST['email'];
	$query = "SELECT * FROM tbl_user WHERE email = '$to'";
		$check = $db->select($query);
		if($check){
			while ($rows = $check->fetch_assoc()) {
			$name = $rows['name'];	
			
	$rand = rand(100000,999999);	
	$password = md5($rand);	

	$subject = 'From IIT, Du for changing your password';
	$message = '<html>
<body>
<h3>Dear '.$name.',</h3>
</br>
<h4>This mail has been sent to you as per your request for changing your password.</h4>
<h4>Your new password will be as follows if you click on the following link:</h4>
</br>
<h4>E-mail: '.$to.'</h4>
<h4>New Password: '.$rand.'</h4>
<h4>Link: <p>'.$url.'?cm='.$to.'&cp='.$password.'"></p>
</br></br></br></br>
<h4>Your regards</h4>
<h4>Admin</h4>
</body>
</html>';
	



$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= '(info@thebengaljournal.com)' . "\r\n";

$send_mail = mail($to,$subject,$message,$headers); 
if ($send_mail) {
	echo '<span class="btn btn-success">An E-mail has been sent to you with new password!</span>';
	echo "<script>window.location = 'login.php';</script>";
}
}}}elseif (isset($_GET['cm'])) {
	$cm = $_GET['cm'];
	$cp = $_GET['cp'];
	$query = "UPDATE tbl_user SET 
	password = '$cp' WHERE email = '$cm'";
	$update = $db->update($query);
	if($update){
		echo '<h4 class="text-info">Yor password has been changed!</h4>';
		echo "<script>window.location = 'login.php';</script>";
	}
}else{
?>
<h3>Forgot Password</h3>
<h6>A new password will be served you against your email address</h6>

<div class="row add_user">
<div class="col-md-6 ">

	<form  action="forget_password.php" method="POST">
	  
	  <div class="form-group">
	    <label for="name">Insert Your Email Address*</label>
	    <input type="text" name="email" class="form-control" id="foremail" placeholder="E-mail" required>
	  </div>	 
	 
	</div>

	<div class="col-md-6 ">
	 
	  <div class="form-group">
	    <label for="submit"></label>
	    <input type="submit" name="send" class="form-control btn btn-info" id="forsubmit" value="Send">
	  </div>
</form>
</div>

</form>

<?php  } ?>
<?php include 'admin_lib/footer.php'; ?>