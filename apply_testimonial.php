<?php include 'assets/header.php'; 
if(Session::get('login')==false){
  echo "<script>window.location = 'index.php';</script>";
}
?>
<hr style="color: black">

<br>

<h2>Student Profile</h2>

<div class="test-head">
<?php  
 

echo '<a class="btn btn-info" href="profile.php" >Back to Profile</a>';




?>

</div>



<?php 
$msg = '';
if(isset($_POST['signup'])){
  
  $class = trim($_POST['class']);
  $batch = trim($_POST['batch']);
  $roll = trim($_POST['roll']);
  $pyear = trim($_POST['pyear']);
  $subject = trim($_POST['subject']);
  $result = trim($_POST['result']);
 

 $query_chk = "SELECT * FROM tbl_testimonial WHERE stu_id='$stu_id' AND class = '$class'";
 $check = $db->select($query_chk);
 if($check){
  $msg = 'You have already applied!';
 }else{
  $query = "INSERT INTO tbl_testimonial (stu_id, class, batch, roll, pyear, subject, result) VALUES('$stu_id', '$class', '$batch', '$roll', '$pyear', '$subject', '$result')";
  $data = $db->insert($query);
    if($data){
      $msg = 'data inserted successfully';
    }
 }

}else{
?>

<span><?php echo $msg; ?></span>
<form id="apply-testimonial" class="registration" action="apply_testimonial.php" method="POST">

<div class="row">
  <div class="form-group col-md-6">
      

  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Class</label> 
    <div class="col-sm-10"> 
    <select class="form-control" name="class" id="classname">
      <option>B.Sc (Eng.)</option>
      <option>MSE</option>
      <option>PGDIT</option>
      <option>MIT</option>     
    </select>
    </div>
  </div>



  <div class="form-group row">    
    <label for="batch" class="col-sm-2 col-form-label">Batch</label>
    <div class="col-sm-10">
      <select class="form-control"  name="batch" id="batch">
      <option>2015</option>
      <option>2016</option>
      <option>2017</option>
      <option>2018</option>   
      <option>2019</option> 
      <option>2020</option> 
      <option>2021</option> 
      <option>2022</option>  
    </select>
    </div>
  </div>



  <div class="form-group row">    
    <label for="roll" class="col-sm-2 col-form-label">Roll No.</label>
    <div class="col-sm-10">
      <input type="text" name="roll" class="form-control" id="roll" placeholder="Roll No.">
    </div>
  </div> 


</div>


  <div class="form-group col-md-6">  

  



  <div class="form-group row">
    <label for="pyear" class="col-sm-2 col-form-label">Passing Year</label>
    <div class="col-sm-10">
     <select class="form-control"  name="pyear" id="pyear">
      <option>2015</option>
      <option>2016</option>
      <option>2017</option>
      <option>2018</option>   
      <option>2019</option> 
      <option>2020</option> 
      <option>2021</option> 
      <option>2022</option>  
    </select>
    </div>
  </div>



<div class="form-group row">    
    <label for="subject" class="col-sm-2 col-form-label">Subject</label>
    <div class="col-sm-10">      
      <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
    </div>
  </div>


  <div class="form-group row">    
    <label for="result" class="col-sm-2 col-form-label">Result</label>
    <div class="col-sm-10">
      <input type="float" name="result" class="form-control" id="result" placeholder="Result">
    </div>
  </div> 



  <div class="form-group row">  
<label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
      <button type="submit" name="signup" class="btn btn-primary float-left" onmouseover="applytestfunction()">Submit</button>
    </div>
  </div>
    </div>
  </div>
</form>




<?php 
}
?>


<!-- The Modal -->
  <div class="modal fade" id="apply_test_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-info">Application Error</h4>
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