<?php include 'admin_lib/header.php'; ?>

<hr style="color: black">


<h3>Change Password</h3>
<h6>Only user are able to change own password</h6>

<div class="row add_user">
<div class="col-md-6 ">


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$confirm_new_password = $_POST['confirm_new_password'];
	$password = md5($old_password);
	$n_password = md5($new_password);

	
	$msg = '';
	$check = 0;
	if($old_password == ''){
		$msg = 'Old password can not be blank! ';
		$check = 1;
	}
	

	if($new_password != $confirm_new_password){
		$msg = 'New password and confirm new password mismatched! ';
		$check = 1;
	}	

	$check_query = "SELECT * FROM tbl_user WHERE email = '$admin_email' AND password = '$password'";
	$check_data = $db->select($check_query);
	if($check_data != true){
		$msg = 'Old password is incorrect!';
		$check = 1;
	}
	

	if($check >0){	
		echo '<span class="text text-danger">'. $msg.'</span>';
	}else{
		
		$query = "UPDATE tbl_user SET 				
				password = '$n_password'				
				WHERE user_id = '$admin_user_id'";
		
		$insert_data = $db->update($query);
		if($insert_data){
			echo '<span class="text text-info">password changes successfully!</span>';
			echo "<script>window.location = 'index.php';</script>";
		}
	
	}
}


?>

	<form id="change_password" action="" method="POST">
	  
	  
	  <div class="form-group">
	    <label for="name">Old Password *</label>
	    <input type="password" name="old_password" class="form-control" id="old_password"  value="">
	  </div>
	  <div class="form-group">
	    <label for="name">New Password *</label>
	    <input type="password" name="new_password" class="form-control" id="new_password"  value="">
	  </div>
	

	
	  
	   <div class="form-group">
	    <label for="name">Confirm New Password *</label>
	    <input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password"  value="">
	  </div>
	  <div class="form-group">
	    <label for="submit"></label>
	    <input type="submit" name="update" class="form-control btn btn-info" id="forsubmit" value="Update" onmouseover="change_password()">
	  </div>
</form>
</div>
<div class="col-md-6 ">
</div>


	
</div>



<!-- The Modal -->
  <div class="modal fade" id="change_password_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-info">Change Password Error</h4>
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