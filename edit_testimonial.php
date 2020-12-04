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

 	
//echo '<a class="btn btn-info" href="edit_profile.php" >Edit Profile</a>';
if(isset($_GET['test_id'])){
  $test_id = $_GET['test_id'];
$query_test = "SELECT * FROM tbl_testimonial WHERE test_id='$test_id'";
 $data_test = $db->select($query_test);
 if($data_test){ 	
 	while ($result = $data_test->fetch_assoc()) {    
 		$stu_id = $result['stu_id'];
 		$amount = $result['amount'];
    $status = $result['status'];

   	
if(isset($_POST['update'])){ 
  $class = trim($_POST['class']);
  $batch = trim($_POST['batch']);
  $roll = trim($_POST['roll']);
  $pyear = trim($_POST['pyear']);
  $subject = trim($_POST['subject']);
  $result = trim($_POST['result']);
  $payment_method = trim($_POST['payment_method']);
  $receip_no = trim($_POST['receip_no']);
  $payment_date = trim($_POST['payment_date']);
  $amount = trim($_POST['amount']);
 

 $query_update = "UPDATE tbl_testimonial SET      
      class = '$class',
      batch = '$batch',
      roll = '$roll',
      pyear = '$pyear',
      subject = '$subject',
      result = '$result',
       payment_method = '$payment_method',
      receip_no = '$receip_no',
      payment_date = '$payment_date',
      amount = '$amount'


      WHERE test_id = '$test_id' ";

      $update_data = $db->update($query_update);
      if($update_data){
        echo "<script>window.location = 'testimonial.php';</script>";

}}


?>

<form action="" method="POST"  id="apply-testimonial" ><a class="btn btn-info" href="testimonial.php" >Back</a><button type="submit" class="btn btn-info" name ="update" onmouseover="applytestfunction()">Save Changes</button>
</div>

<table class="table table-bordered tbl-profile">
  
  <tbody>
   <tr>
      <th scope="row">1</th>
      <td>Class</td>
      <td>
        <select name="class" id="classname">
      <option>
      <?php echo $result['class'];  ?>
      </option>
      <option>B.Sc (Eng.)</option>
      <option>MSE</option>
      <option>PGDIT</option>
      <option>MIT</option> 
    </select>

      </td>      
    </tr><tr>
      <th scope="row">2</th>
      <td>Batch</td>
      <td>
        <select name="batch" id="batch">
      <option>
      <?php echo $result['batch'];  ?>
      </option>
      <option>2015</option>
      <option>2016</option>
      <option>2017</option>
      <option>2018</option>   
      <option>2019</option> 
      <option>2020</option> 
      <option>2021</option> 
      <option>2022</option>  
    </select>
      </td>      
    </tr><tr>
      <th scope="row">3</th>
      <td>Roll No.</td>
      <td>
        <input type="text" id="roll" name="roll" value="<?php echo $result['roll'];  ?>">
      </td>      
    </tr><tr>
      <th scope="row">4</th>
      <td>Passing Year</td>
      <td><select name="pyear">
      <option>
      <?php echo $result['pyear'];  ?>
      </option>
      <option>2015</option>
      <option>2016</option>
      <option>2017</option>
      <option>2018</option>   
      <option>2019</option> 
      <option>2020</option> 
      <option>2021</option> 
      <option>2022</option>  
    </select>
      </td>      
    </tr><tr>
      <th scope="row">5</th>
      <td>Subject</td>
      <td>
        <input type="text" id="subject" name="subject" value="<?php echo $result['subject'];  ?>">
      </td>      
    </tr><tr>
      <th scope="row">6</th>
      <td>Result</td>
      <td>
        <input type="text" id="result" name="result" value="<?php echo $result['result'];  ?>">
      </td>      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Payment Method</td>
      <td>
        <select name="payment_method">
      <option>
      <?php echo $result['payment_method'];  ?>
      </option>
      <option>BKASH</option>
      <option>AGRANI BANK</option>
      <option>CASH</option>      
    </select>    
    </td>      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Receipt/Mobile No.</td>
      <td>
        <input type="text" id="receip_no" name="receip_no" value="<?php echo $result['receip_no'];  ?>">
      </td>      
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>Payment Date</td>
      <td>
        <input type="date" id="payment_date" name="payment_date" value="<?php echo $result['payment_date'];  ?>">
      </td>      
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>Amount</td>
      <td>
        <input type="text" id="amount" name="amount" value="<?php echo $result['amount'];  ?>">
      </td>      
    </tr>


</tbody>
</table>
</form>


<?php   }
}} ?>


<!-- The Modal -->
  <div class="modal fade" id="apply_test_modal">
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