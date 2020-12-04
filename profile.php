<?php include 'assets/header.php'; ?>
<hr style="color: black">


<h2>Student Profile</h2>



<div class="test-head">
<?php  

	$query = "SELECT * FROM tbl_student WHERE stu_id='$stu_id'";
 $data = $db->select($query);
 if($data){
 	while ($rows = $data->fetch_assoc()) {

 		$stu_id = $rows['stu_id'];
 	
echo '<a class="btn btn-info" href="edit_profile.php" >Edit Profile</a>';
echo '<a class="btn btn-info" href="testimonial.php" >Testimonial</a>';

?>

</div>

<table class="table table-bordered tbl-profile">
  
  <tbody>
    <tr>
      <th width="10%" scope="row">1</th>
      <td  width="40%">Name</td>
      <td  width="50%"><b><?php echo $rows['name'];  ?></b></td>      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>E-mail</td>
      <td><?php  echo $rows['email'];  ?></td>      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Gender</td>
      <td><?php  echo $rows['gender']; ?></td>      
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Father</td>
      <td><?php  echo $rows['father']; ?></td>      
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Mother</td>
      <td><?php echo $rows['mother'];  ?></td>      
    </tr><tr>
      <th scope="row">6</th>
      <td>Permanent Address</td>
      <td><?php echo $rows['paddress'];  ?></td>      
    </tr><tr>
      <th scope="row">7</th>
      <td>Mailing Address</td>
      <td><?php echo $rows['maddress'];  ?></td>      
    </tr><tr>
      <th scope="row">8</th>
      <td>Mobile</td>
      <td><?php echo $rows['mobile'];  ?></td>      
    </tr>

</tbody>
</table>



<?php  }}else{echo "No Data Found!";}  ?>



<?php include 'assets/footer.php'; ?>