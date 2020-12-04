<?php include 'admin_lib/header.php'; ?>

<hr style="color: black">

<br>
<h1 id="change">Details</h1>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">

<table class="table table-bordered">
  <thead>
      <tr>
      <th scope="col">Sl. No</th>
      <th scope="col">Description</th>
      <th scope="col">Data</th>
      </tr>
  </thead>
   <tbody>
  <?php
if(isset($_GET['confirm_stu_id'])){
  
  $confirm_stu_id = $_GET['confirm_stu_id'];
  $query = "UPDATE tbl_testimonial set 
  status = 'yes', 
  prepared_by = '$admin_name' 
  WHERE stu_id = '$confirm_stu_id'";
  $confirm = $db->update($query);
  if($confirm){
     echo "<script>window.location = 'testimonial_list.php';</script>";
  }


}

if(isset($_GET['test_id'])){
  $test_id = $_GET['test_id'];
$query = "SELECT * FROM tbl_student INNER JOIN tbl_testimonial ON tbl_student.stu_id = tbl_testimonial.stu_id WHERE tbl_testimonial.test_id ='$test_id'";
$data = $db->select($query);
if($data){
  while ($rows = $data->fetch_assoc()) {
   echo '<tr>
      <td scope="col">01</td>
      <td scope="col">Name</td>
      <td>'.$rows['name'].'</td>      
    </tr>
    <tr>
      <td scope="col">02</td>
      <td scope="col">Email</td>
      <td>'.$rows['email'].'</td>      
    </tr>

    <tr>
      <td scope="col">03</td>
      <td scope="col">Gender</td>
      <td>'.$rows['gender'].'</td>      
    </tr>

    <tr>
      <td scope="col">04</td>
      <td scope="col">Father</td>
      <td>'.$rows['father'].'</td>      
    </tr>

    <tr>
      <td scope="col">05</td>
      <td scope="col">Mother</td>
      <td>'.$rows['mother'].'</td>      
    </tr>

    <tr>
      <td scope="col">06</td>
      <td scope="col">Permanent address</td>
      <td>'.$rows['paddress'].'</td>      
    </tr>

    <tr>
      <td scope="col">07</td>
      <td scope="col">Mailing address</td>
      <td>'.$rows['maddress'].'</td>      
    </tr>
    <tr>
      <td scope="col">08</td>
      <td scope="col">Mobile </td>
      <td>'.$rows['mobile'].'</td>      
    </tr>

    <tr>
      <td scope="col">09</td>
      <td scope="col">Class </td>
      <td>'.$rows['class'].'</td>      
    </tr>
    <tr>
      <td scope="col">10</td>
      <td scope="col">Batch </td>
      <td>'.$rows['batch'].'</td>      
    </tr>
    <tr>
      <td scope="col">11</td>
      <td scope="col">Roll </td>
      <td>'.$rows['roll'].'</td>      
    </tr>
    <tr>
      <td scope="col">12</td>
      <td scope="col">Passing Year </td>
      <td>'.$rows['pyear'].'</td>      
    </tr>
    <tr>
      <td scope="col">13</td>
      <td scope="col">Subject </td>
      <td>'.$rows['subject'].'</td>      
    </tr>
    <tr>
      <td scope="col">14</td>
      <td scope="col">Result </td>
      <td>'.$rows['result'].'</td>      
    </tr>
    <tr>
      <td scope="col">15</td>
      <td scope="col">Payment method </td>
      <td>'.$rows['payment_method'].'</td>      
    </tr>
    <tr>
      <td scope="col">16</td>
      <td scope="col">Receip no. </td>
      <td>'.$rows['receip_no'].'</td>      
    </tr>
    <tr>
      <td scope="col">17</td>
      <td scope="col">Payment date </td>
      <td>'.$rows['payment_date'].'</td>      
    </tr>
    <tr>
      <td scope="col">18</td>
      <td scope="col">Amount </td>
      <td>'.$rows['amount'].'</td>      
    </tr>

    <tr>
      <td scope="col">19</td>
      <td scope="col">Status </td>
      <td>'.$rows['status'].'</td>      
    </tr>
    </tbody>
</table>
    ';
    if($rows['amount'] !=0 && $rows['status'] !='yes'){

echo '<a href="view_testimonial.php?confirm_stu_id='.$rows['stu_id'].'" class="btn btn-info float-right" onclick="return confirm(\'Are you sure to confirm? \');">Confirm</a>';
}else{ echo '<a class="btn btn-secondary" href="testimonial_list.php">Back</a>';}
    }}}  ?> 
   
  </br></br></br>
</div>
  <div class="col-sm-2"></div>  
</div>


<?php include 'admin_lib/footer.php'; ?>