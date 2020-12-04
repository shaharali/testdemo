
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Student Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  

		$cook_email = '';	
		$cook_password = '';
		$cook_name = '';
		$check_cook = '';

if(isset($_COOKIE["iit_student_cookie"]) && $_COOKIE["iit_student_cookie"] !='') {	
				$iit_student_cookie = $_COOKIE["iit_student_cookie"];	
				$query = "SELECT * FROM tbl_cookie WHERE cook_id = (SELECT max(cook_id) FROM tbl_cookie WHERE cook_email = '$iit_student_cookie')";
				$data = $db->select($query);				
				if($data){

					while ($row = $data->fetch_assoc()) {						
						$cook_email = $row['cook_email'];
						$cook_password = $row['cook_password'];
						$cook_name = 'Login as '.$row['cook_name'];
						$check_cook = 'checked';
					} }
				
	}
	

	

 ?>
      <!-- Modal body -->
      <div class="modal-body">
      			<form action="login.php" method="POST">
				  <div class="form-group">
				  <p><?php echo $cook_name ;?></p>
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $cook_email; ?>">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" name="password" class="form-control" id="password" value="<?php echo $cook_password; ?>">
				  </div>
				  <div class="form-check">
				     <input type="checkbox" name="show" id="show" onclick="showhide('password','show');">Show Password</br>
				    <input type="checkbox" name="remember" class="form-check-input" id="remember" value="yes" <?php echo $check_cook; ?>>				     
				    <label class="form-check-label" for="remember">Remember me</label>
				  </div>
				  <button type="submit" name="login" class="btn btn-primary">Login</button>
				</form>
      </div>

      <!-- Modal footer -->
     <div class="modal-foot">
     	<a href="signup.php">New user? Sign UP Now</a>
        <a href="forget_pass.php">Forgot Password?</a>
     </div>
      

    </div>
  </div>
</div>
<!--  End Modal  -->


</div>			
</div>	

	<div class="row w-110 " >
			<div class="col-sm-4 text-center text-white ">
				<h2>About IIT</h2>
				<p>Institute of Information Technology is one of the fastest growing Institute at University of Dhaka. The study at this Institute is based on three core values: professionalism, excellence and respect. By establishing these principles, IIT ensures that graduates from this Institute can effectively contribute in the industry.</p>
			</div>
			<div class="col-sm-4 text-center text-white">
				<h2>Vision</h2>
				<p>Institute of Information Technology, University of Dhaka aims to be the producer of future leaders in Software Engineering. In this course, it is intended to open up new horizons and advance the frontiers of knowledge in Software Engineering.</p>
			</div>
			<div class="col-sm-4 text-center text-white">
				<h2>Contact Information</h2>
				<p>IIT,University of Dhaka
					Dhaka, Bangladesh
					Phone: 8801779482994
					Website: http://www.iit.du.ac.bd
					Email: iit@du.ac.bd</p>
			</div>
	</div>


	<div class="row w-111 ">
			<div class="col-sm-12 text-center">
				<a href="index.php">Copy Right: Md. Shahar Ali @ 2020</a>
			</div>
	</div>
</div>

<!--
<button onclick="mycontainer()">Dark</button>

-->
</body>
</html>