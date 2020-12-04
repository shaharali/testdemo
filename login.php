<?php include 'assets/header.php'; ?>
<hr style="color: black">

<br>
<h1>User Login</h1>

<?php 

if(isset($_POST['login'])){
	$email = trim($_POST['email']);	
	$password_main = $_POST['password'];
	$password = md5($_POST['password']);
	

	$query = "SELECT * FROM tbl_student WHERE email = '$email' AND password = '$password'";
		$check = $db->select($query);
		if($check){
			while ($rows=$check->fetch_assoc()) {
				$name = $rows['name'];
				$father = $rows['father'];
				$mobile = $rows['mobile'];
				$stu_id = $rows['stu_id'];
			
		Session::set("login", "true");
		Session::set("name", $name);	
		Session::set("father", $father);	
		Session::set("mobile", $mobile);	
		Session::set("stu_id", $stu_id);	
		Session::set("email", $email);	

		if(!empty($_POST['remember']) && $_POST['remember'] == "yes"){	
			if(!isset($_COOKIE["iit_student_cookie"]) || $_COOKIE["iit_student_cookie"] !=$email)
					{
				$query = "INSERT INTO tbl_cookie (cook_email, cook_password,cook_name) VALUES('$email', '$password_main', '$name')";
				$db->insert($query);
					}
			}else{
				$query = "DELETE FROM tbl_cookie WHERE cook_email = '$email'";
				$db->delete($query);
			}
			$time_login = date('Y-m-d-h-i-sa');
			$query = "INSERT INTO tbl_session (email, time_login, user_ip) VALUES('$email', '$time_login', '$user_ip')";
				$db->insert($query);

		echo "<script>window.location = 'profile.php';</script>";
			
		}
	
}


echo "<script>window.location = 'contact.php';</script>";
}else{

echo "<script>window.location = 'contact.php';</script>";
}
?>









<?php include 'assets/footer.php'; ?>