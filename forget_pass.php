<?php include 'assets/header.php'; ?>
<?php include 'assets/slider.php'; ?>
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
	$query = "SELECT * FROM tbl_student WHERE email = '$to'";
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
<h4>This mail is sent to you as per your request for changing your password.</h4>
<h4>Your new password will be ass follows if you click on the following link:</h4>
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
}
}}}elseif (isset($_GET['cm'])) {
	$cm = $_GET['cm'];
	$cp = $_GET['cp'];
	$query = "UPDATE tbl_student SET 
	password = '$cp' WHERE email = '$cm'";
	$update = $db->update($query);
	if($update){
		echo '<h4 class="text-info">Yor password has been changed!</h4>';
	}
}else{
?>
<h3>Forgot Password</h3>
<h6>A new password will be served you against your email address</h6>

<div class="row add_user">
<div class="col-md-6 ">

	<form  action="forget_pass.php" method="POST">
	  
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

<?php include 'assets/footer.php'; ?>


