<?php include 'assets/header.php'; 
if(Session::get('login')==false){
  echo "<script>window.location = 'index.php';</script>";
}
?>
<hr style="color: black">

<br>

<h2>Student Profile</h2>

<?php 

if(isset($_POST['update'])){
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);  
  $gender = trim($_POST['gender']);
  $father = trim($_POST['father']);
  $mother = trim($_POST['mother']);
  $paddress = trim($_POST['paddress']);
  $maddress = trim($_POST['maddress']);
  $mobile = trim($_POST['mobile']);
 

 $query_update = "UPDATE tbl_student SET 
      name = '$name',
      email = '$email',  
      gender = '$gender',
      father = '$father',
      mother = '$mother',
      paddress = '$paddress',
      maddress = '$maddress',
      mobile = '$mobile'
     

      WHERE email = '$email' ";

      $update_data = $db->update($query_update);
      if($update_data){
        echo "<script>window.location = 'profile.php';</script>";

}}

  ?>

<div class="test-head">
<?php  

$query = "SELECT * FROM tbl_student WHERE stu_id='$stu_id'";
 $data = $db->select($query);
 if($data){
 	while ($rows = $data->fetch_assoc()) {

 		$stu_id = $rows['stu_id'];
 	
echo '<form action="" method="POST" id="signup"><a class="btn btn-info" href="profile.php" >Back to Profile</a>';

?>

<a href=""><button class="btn btn-info" type="submit" name="update" onmouseover="signupfunction()">Save Changes</button></a>
</div>

<table class="table table-bordered tbl-profile">
  
  <tbody>
    <tr>
      <th width="10%" scope="row">1</th>
      <td  width="40%">Name</td>
      <td  width="50%"><b><input type="text" id="name" name="name" value="<?php echo $rows['name'];  ?>"></b></td>      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>E-mail</td>
      <td><input type="text" name="email" id="email" value="<?php  echo $rows['email'];  ?>" readonly><input type="hidden" name="password" id="password" value="<?php  echo $rows['password'];  ?>" readonly>
      </td>      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Gender</td>
      <td><select name="gender"><option><?php  echo $rows['gender']; ?></option><option>Male</option><option>Female</option></select></td>      
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Father</td>
      <td><input type="text" name="father" id="father" value="<?php  echo $rows['father']; ?>"></td>      
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Mother</td>
      <td><input type="text" name="mother" id="mother"  value="<?php echo $rows['mother'];  ?>"></td>      
    </tr><tr>
      <th scope="row">6</th>
      <td>Permanent Address</td>
      <td><input type="text" name="paddress"  id="paddress" value="<?php echo $rows['paddress'];  ?>"></td>      
    </tr><tr>
      <th scope="row">7</th>
      <td>Mailing Address</td>
      <td><input type="text" name="maddress" id="maddress" value="<?php echo $rows['maddress'];  ?>"></td>      
    </tr><tr>
      <th scope="row">8</th>
      <td>Mobile</td>
      <td><input type="text" name="mobile" id="mobile" value="<?php echo $rows['mobile'];  ?>"></td>      
    </tr>
</tbody>
</table>

</form>

<?php  }}else{echo "No Data Found!";}  ?>

<!-- The Modal -->
  <div class="modal fade" id="signup_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-info">Update Error</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h5 class="text-danger" id="signup-error"></h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
        </div>
        
      </div>
    </div>
  </div>


<?php include 'assets/footer.php'; ?>