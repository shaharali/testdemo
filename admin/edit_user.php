<?php include 'admin_lib/header.php'; ?>

<hr style="color: black">
<?php if ($admin_level != 'Admin') {
	echo "<script>window.location = 'index.php';</script>";
} ?>

<h3>Update User</h3>
<h6>Only Admin are allowed to add new user.</h6>

<div class="row add_user">
<div class="col-md-6 ">


<?php
if($_SERVER['REQUEST_METHOD']==='POST' && $_POST['update']){
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
		
		$query = "UPDATE tbl_user SET 
				user_id = '$user_id',
				password = '$password',
				name = '$name',
				level = '$level'
				WHERE email = '$email'";
		
		$insert_data = $db->update($query);
		if($insert_data){
			echo '<span class="text text-info">User data of '.$name.' updated successfully!</span>';
			echo "<script>window.location = 'users.php';</script>";
		}
	
	}
}

if(isset($_GET['edit_user_id'])){
	$edit_user_id = $_GET['edit_user_id'];
	$query = "SELECT * FROM tbl_user WHERE user_id = '$edit_user_id'";
	$data = $db->select($query);
	if($data){
		while ($rows = $data->fetch_assoc()) {
			$user_id = $rows['user_id'];
			$email = $rows['email'];
			$password = $rows['password'];
			$name = $rows['name'];
			$level = $rows['level'];
		
?>

	<form id="add_user" action="edit_user.php" method="POST">
	  
	  <div class="form-group">
	    <label for="name">E-mail *</label>
	    <input type="text" name="email" class="form-control" id="foremail" value="<?php echo $email; ?>" readonly>
	  </div>	 
	  <div class="form-group">
	    <label for="name">User ID *</label>
	    <input type="text" name="user_id" class="form-control" id="foruser_id"  value="<?php echo $user_id; ?>">
	  </div>
	  <div class="form-group">
	    <label for="name">Password *</label>
	    <input type="password" name="password" class="form-control" id="forpassword"  value="">
	  </div>
	</div>

	<div class="col-md-6 ">
	  <div class="form-group">
	    <label for="name">Name *</label>
	    <input type="text" name="name" class="form-control" id="forname"  value="<?php echo $name; ?>">
	  </div>
	  <div class="form-group">
	    <label for="name">User Level *</label>
	    <select  name="level" class="form-control" id="forlevel" >
	    	<option> <?php echo $email; ?></option>
	    	<option>Admin</option>
	    	<option>Supervisor</option>
	    	<option>User</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="submit"></label>
	    <input type="submit" name="update" class="form-control btn btn-info" id="forsubmit" value="Update" onmouseover="foradduser()">
	  </div>
</form>
<?php  }} }?>
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