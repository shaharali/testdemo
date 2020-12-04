<?php include 'admin_lib/header.php'; ?>

<hr style="color: black">

<div class="sub-job-list">
	<h3>All Users</h3>
	
</div>

<table class="table table-striped ">
  <thead class="bg-secondary">
    <tr>
      <th scope="col">SL. No</th>
      <th scope="col">User ID</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">NAME</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

<?php 
	$query = "SELECT * FROM tbl_user";
	$data = $db->select($query);
	if($data){
		$i =0;
		while ($rows = $data->fetch_assoc()) {
			$i++;
			$email = $rows['email'];
			$user_id = $rows['user_id'];
			$name = $rows['name'];

			echo '<tr>
			      <th scope="row">'.$i.'</th>
			      <td>'.$user_id.'</td>
			      <td>'.$email.'</td>
			      <td>'.$name.'</td>
			      <td><a class="btn btn-info" href="edit_user.php?edit_user_id='.$user_id.'">Edit</a></td>
			    </tr>';
			
		}
	}

?>

 </tbody>
</table>

















<?php include 'admin_lib/footer.php'; ?>