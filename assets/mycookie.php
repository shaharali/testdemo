<?php
if(isset($_POST['login'])){
	if(!empty($_POST['remember']) && $_POST['remember'] == "yes"){	
		if(!isset($_COOKIE["iit_student_cookie"]) || $_COOKIE["iit_student_cookie"] !=$_POST['email'])
		{
				setcookie("iit_student_cookie", $_POST['email']  , time()+30*24*60*60);
		}
		
	}else{
		setcookie("iit_student_cookie", ''  , time()+30*24*60*60);
	}
}


?>