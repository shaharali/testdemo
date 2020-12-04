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

   	
if(isset($_POST['submit'])){ 
  $payment_method = trim($_POST['payment_method']);
  $receip_no = trim($_POST['receip_no']);
  $payment_date = trim($_POST['payment_date']);
  $amount = trim($_POST['amount']);
 

 $query_update = "UPDATE tbl_testimonial SET      
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

<form action="" method="POST"><a class="btn btn-info" href="testimonial.php" >Back</a><button type="submit" class="btn btn-info" name ="update">Save Changes</button>
</div>

<table class="table table-bordered tbl-profile">
  
  <tbody>   
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

    <tr>
      <th scope="row">3</th>
      <td>Amount</td>
      <td>
        <input class="btn btn-info" type="submit" id="submit" name="submit" value="Save">
      </td>      
    </tr>
    
</tbody>
</table>
</form>


<?php   }
}} ?>


<?php include 'assets/footer.php'; ?>