<?php include 'assets/header.php'; ?>
<hr style="color: black">

<br>
<h2>User Login</h2>

<?php 

if($_SERVER['REQUEST_METHOD']=='POST'){
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$password = md5(trim($_POST['password']));
  $gender = trim($_POST['gender']);
  $father = trim($_POST['father']);
  $mother = trim($_POST['mother']);
  $paddress = trim($_POST['paddress']);
  $maddress = trim($_POST['maddress']);
  $mobile = trim($_POST['mobile']);
  
 

 $query_chk = "SELECT * FROM tbl_student WHERE email='$email' || mobile = '$mobile'";
 $check = $db->select($query_chk);
 if($check){
  echo  'Your email / mobile already used !';
 }else{
  $query = "INSERT INTO tbl_student (name, email, password, gender, father, mother, paddress, maddress, mobile) VALUES('$name', '$email', '$password', '$gender', '$father', '$mother', \"$paddress\", \"$maddress\", '$mobile')";
  $data = $db->insert($query);
    if($data){
      echo 'data inserted successfully';
      echo "<script>window.location = 'index.php';</script>";
    }
 }

}else{
?>


<form id="signup" class="registration" action="" method="POST">

<div class="row">
  <div class="form-group col-md-6">
      


	<div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
    </div>
  </div>


<div class="form-group row">  
  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
<div class="col-sm-10">
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" value="Male" id="male" checked>
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" value="Female" id="female" >
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
      </div>
</div>


  <div class="form-group row">    
    <label for="name" class="col-sm-2 col-form-label">Father</label> 
    <div class="col-sm-10">   
      <input type="text" name="father" class="form-control" id="father" placeholder="Father">
    </div>
  </div>


  <div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">Mother</label>
    <div class="col-sm-10">   
      <input type="text" name="mother" class="form-control" id="mother" placeholder="Mother">
    </div>
  </div>



  <div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">Parmanent Address</label>
    <div class="col-sm-10">
      <input type="text" name="paddress" class="form-control" id="paddress" placeholder="Parmanent Address">
    </div>
  </div>



  
</div>


  <div class="form-group col-md-6">  

  <div class="form-group row">  
    <label for="name" class="col-sm-2 col-form-label">Mailing Address</label>
    <div class="col-sm-10">
      <input type="text" name="maddress" class="form-control" id="maddress" placeholder="Mailing Address">
    </div>
  </div>

<div class="form-group row">   
    <label for="name" class="col-sm-2 col-form-label">Mobile</label>
    <div class="col-sm-10">
      <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
    </div>
  </div>
 


  <div class="form-group row"> 
    <label for="name" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

   <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
  </div>

  


  <div class="form-group row">  

    <div class="col-sm-10">
      <button type="submit" name="signup" class="btn btn-primary" onmouseover="signupfunction()">Sign Up</button>
    </div>
  </div>
    </div>
  </div>
</form>

<!-- The Modal -->
  <div class="modal fade" id="signup_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-info">Signup Error</h4>
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


<?php 
}
?>
<?php include 'assets/footer.php'; ?>