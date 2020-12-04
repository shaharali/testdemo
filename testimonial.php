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

//echo '<a class="btn btn-info" href="profile.php" >Back to Profile</a>';


$query_test = "SELECT * FROM tbl_testimonial WHERE stu_id='$stu_id'";
 $data_test = $db->select($query_test);
 if(!$data_test){
 	echo '<a class="btn btn-info" href="apply_testimonial.php" >Apply for Testimonial</a>';
 }else{
  $i=0;
 	while ($result = $data_test->fetch_assoc()) {
    $i++;
 		$test_id = $result['test_id'];
    $stu_id = $result['stu_id'];
 		$amount = $result['amount'];
    $status = $result['status'];
    $class = $result['class'];

    if($status == 'yes'){      
      echo '<a class="btn btn-warning" href="assets/pdf/testimonial_pdf.php?stu_id='.$stu_id.'" target="_blank">Download Testimonial for '.$class.'</a></br>';
    }elseif($amount == 0){
 			echo '<a class="btn btn-info" href="payment_testimonial.php?test_id='.$test_id.'" >Payment for Testimonial '.$class.'</a>';
      echo '<a class="btn btn-info" href="edit_testimonial.php?test_id='.$test_id.'" >Update Testimonial</a>'; 
   
?>
</div>
<table class="table table-bordered tbl-profile">
  
  <tbody>
   <tr>
      <th scope="row">1</th>
      <td>Class</td>
      <td><p id="mydata1"> <?php echo $result["class"];  ?></p>
       
      </td>      
    </tr><tr>
      <th scope="row">2</th>
      <td>Batch</td>
      <td><p id="mydata2"> <?php  echo $result["batch"]; ?></p>
        </td>      
    </tr><tr>
      <th scope="row">3</th>
      <td>Roll No.</td>
      <td><p id="mydata"> <?php echo $result["roll"]; ?></p>
          </td>      
    </tr><tr>
      <th scope="row">4</th>
      <td>Passing Year</td>
      <td><?php echo $result["pyear"];  ?></td>      
    </tr><tr>
      <th scope="row">5</th>
      <td>Subject</td>
      <td><p id="mydata"> <?php echo $result["subject"];  ?></p>
       </td>      
    </tr><tr>
      <th scope="row">6</th>
      <td>Result</td>
      <td><p id="mydata"> <?php echo $result["result"];  ?></p>
        </td>      
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Payment Method</td>
      <td><p id="mydata"> <?php echo $result["payment_method"];  ?></p>
        </td>      
    </tr>
    <tr>
      <th scope="row">8</th>
      <td>Receipt/Mobile No.</td>
      <td><p id="mydata"> <?php echo $result["receip_no"];  ?></p>
        </td>      
    </tr>
    <tr>
      <th scope="row">9</th>
      <td>Payment Date</td>
      <td><p id="mydata"> <?php echo $result["payment_date"];  ?></p>
        </td>      
    </tr>
    <tr>
      <th scope="row">10</th>
      <td>Amount</td>
      <td><p id="mydata"> <?php echo $result["amount"];  ?></p>
        </td>      
    </tr>
  
</tbody>
</table>
<?php 

   }else{
    
    echo '<a class="btn btn-info" href="edit_testimonial.php?test_id='.$test_id.'" >Update Testimonial</a>'; 
   
    
?>

</div>

<table class="table table-bordered tbl-profile">
  
  <tbody>
   <tr>
      <th scope="row">1</th>
      <td>Class</td>
      <td><p id="mydata1"> <?php echo $result["class"];  ?></p>
       
      </td>      
    </tr><tr>
      <th scope="row">2</th>
      <td>Batch</td>
      <td><p id="mydata2"> <?php  echo $result["batch"]; ?></p>
        </td>      
    </tr><tr>
      <th scope="row">3</th>
      <td>Roll No.</td>
      <td><p id="mydata"> <?php echo $result["roll"]; ?></p>
          </td>      
    </tr><tr>
      <th scope="row">4</th>
      <td>Passing Year</td>
      <td><?php echo $result["pyear"];  ?></td>      
    </tr><tr>
      <th scope="row">5</th>
      <td>Subject</td>
      <td><p id="mydata"> <?php echo $result["subject"];  ?></p>
       </td>      
    </tr><tr>
      <th scope="row">6</th>
      <td>Result</td>
      <td><p id="mydata"> <?php echo $result["result"];  ?></p>
        </td>      
    </tr>
   <tr>
      <th scope="row">7</th>
      <td>Payment Method</td>
      <td><p id="mydata"> <?php echo $result["payment_method"];  ?></p>
        </td>      
    </tr>
    <tr>
      <th scope="row">8</th>
      <td>Receipt/Mobile No.</td>
      <td><p id="mydata"> <?php echo $result["receip_no"];  ?></p>
        </td>      
    </tr>
    <tr>
      <th scope="row">9</th>
      <td>Payment Date</td>
      <td><p id="mydata"> <?php echo $result["payment_date"];  ?></p>
        </td>      
    </tr>
    <tr>
      <th scope="row">10</th>
      <td>Amount</td>
      <td><p id="mydata"> <?php echo $result["amount"];  ?></p>
        </td>      
    </tr>
    </tr>
</tbody>
</table>
<?php    
  }
}
if($status == 'yes'){
      echo '<a class="btn btn-info" href="apply_testimonial.php" >Apply for New Testimonial</a>';}

} ?>

</div>
</br></br>

<p>Every student is eligible for Testimonial after completion of his degree. There is no scope to get extra Testimonial for same degree.</p>

<?php include 'assets/footer.php'; ?>