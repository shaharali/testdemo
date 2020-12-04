<?php include 'admin_lib/header.php'; ?>

<hr style="color: black">
<div class="sub-job-list"> 
  <a href="students.php?refresh" class="btn btn-primary float-left">Refresh Page</a>
  <a class="btn btn-info" href="all_testimonial.php">All Testimonial</a>
   <a class="btn btn-info" href="testimonial_list.php">Testimonial Apply</a>
  <a class="btn btn-info" href="students.php">Students</a>  
</div>


<h2>Student List</h2>

<?php
if(isset($_GET['active_stu_id'])){
  $active_stu_id = $_GET['active_stu_id'];
  $query = "UPDATE tbl_student SET position = 'Active' WHERE stu_id= '$active_stu_id'";
  $db->update($query);
}


if(isset($_GET['refresh'])){ 
$query = "SELECT * FROM tbl_student WHERE position= ''";
$data = $db->select($query);
if($data){
	$i=0;
	while ($rows = $data->fetch_assoc()) {
	    $i++;
    $stu_id = $rows['stu_id'];
  $query = "DELETE FROM tbl_student WHERE stu_id = '$stu_id'";
  $db->delete($query);
  $query = "DELETE FROM tbl_testimonial WHERE stu_id = '$stu_id'";
  $db->delete($query);
	}}
}

?>


</br>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sl. No</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Gender</th>
      <th scope="col">Father</th>
      <th scope="col">Mother</th>
      <th scope="col">Permanent Address</th>
      <th scope="col">Mailing Address</th>      
      <th scope="col">Mobile</th>   
      <th scope="col">Position</th>  
     
      <th></th>    
    </tr>
  </thead>
  <tbody>
<?php
$query = "SELECT * FROM tbl_student ORDER BY stu_id DESC";
$data = $db->select($query);
if($data){
	$i=0;
	while ($rows = $data->fetch_assoc()) {
    $stu_id = $rows['stu_id'];
		$i++;
		echo '<tr">
      <th scope="row">'.$i.'</th>
      <td>'.$rows['name'].'</td>
      <td>'.$rows['email'].'</td>
      <td>'.$rows['gender'].'</td>
      <td>'.$rows['father'].'</td>
      <td>'.$rows['mother'].'</td>
      <td>'.$rows['paddress'].'</td>
      <td>'.$rows['maddress'].'</td>
      <td>'.$rows['mobile'].'</td>
      ';

      if($rows['position'] !='') { 
      echo '<td>'.$rows['position'].'</td>';
      }else{   
     echo '<td><a href="students.php?active_stu_id='.$stu_id.'" class="btn btn-info" onclick="return confirm(\'Are you sure that '.$rows['name'].' is your student?\');">Approve</a></td>';
   }

    echo '</tr>';
	}
}

?>
   
  </tbody>
</table>




<?php include 'admin_lib/footer.php'; ?>