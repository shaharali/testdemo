<?php include 'admin_lib/header.php'; ?>

<hr style="color: black">


<h3>Adding New User</h3>
<h6>Only Admin are allowed to add new user.</h6>

<div class="row add_user">
<div class="col-md-6 ">


<?php
if($_SERVER['REQUEST_METHOD']==='POST' && $_POST['adduser']){
	$user_id = $_POST['user_id'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$name = $_POST['name'];
	$level = $_POST['level'];
	

	$check_email = strpos($email, "@");
	$msg = '';
	$check = 0;
	if($check_email ==''){
		$msg = 'Please insert a valid E-mail!';
		$check = 1;
	}
	if($name ==''){
		$msg .= 'Name is must!';
		$check = 1;
	}

	if($user_id ==''){
		$msg .= 'Name is must!';
		$check = 1;
	}

	if($password ==''){
		$msg .= 'Name is must!';
		$check = 1;
	}

	if($level ==''){
		$msg .= 'Name is must!';
		$check = 1;
	}
	
	

	if($check >0){	
		echo '<span class="text text-danger"><?php  echo $msg?></span>';
	}else{
		if($admin_level == 'Admin'){
		$query = "INSERT INTO tbl_user(email, user_id, password, name, level)VALUES( '$email', '$user_id', '$password', '$name', '$level')";
		$insert_data = $db->insert($query);
		if($insert_data){
			echo '<span class="text text-info">User '.$name.' inserted successfully!</span>';
			echo "<script>window.location = 'users.php';</script>";
		}
	}else{ echo '<span class="text text-info">Only Admin can add new user!</span>';}
	}
	


}
?>

	<form id="add_user" action="add_user.php" method="POST">
	  
	  <div class="form-group">
	    <label for="name">E-mail *</label>
	    <input type="text" name="email" class="form-control" id="foremail" >
	  </div>	 
	  <div class="form-group">
	    <label for="name">User ID *</label>
	    <input type="text" name="user_id" class="form-control" id="foruser_id" placeholder="User ID">
	  </div>
	  <div class="form-group">
	    <label for="name">Password *</label>
	    <input type="password" name="password" class="form-control" id="forpassword" placeholder="Password">
	  </div>
	</div>

	<div class="col-md-6 ">
	  <div class="form-group">
	    <label for="name">Name *</label>
	    <input type="text" name="name" class="form-control" id="forname" placeholder="Name">
	  </div>
	  <div class="form-group">
	    <label for="name">User Level *</label>
	    <select  name="level" class="form-control" id="forlevel" >
	    	<option>Admin</option>
	    	<option>Supervisor</option>
	    	<option>User</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="submit"></label>
	    <input type="submit" name="adduser" class="form-control btn btn-info" id="forsubmit" value="Submit" onmouseover="foradduser()">
	  </div>
</form>
</div>


	
</div>



<!-- The Modal -->
  <div class="modal fade" id="add_user_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-info">Add User Error</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h5 class="text-danger" id="cortact-error"></h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
        </div>
        
      </div>
    </div>
  </div>














<?php include 'admin_lib/footer.php'; ?>