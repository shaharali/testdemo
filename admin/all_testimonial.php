<?php include 'admin_lib/header.php'; ?>

<hr style="color: black">

<div class="sub-job-list"> 
  <a class="btn btn-info" href="all_testimonial.php">All Testimonial</a>
   <a class="btn btn-info" href="testimonial_list.php">Testimonial Apply</a>
  <a class="btn btn-info" href="students.php">Students</a>  
</div>
<h1 id="change">All Testimonial</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sl. No</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Mobile</th>
      <th scope="col">Class</th>
      <th scope="col">Batch</th>
      <th scope="col">Amount Paid</th>  
      <th></th>    
    </tr>
  </thead>
  <tbody>
<?php
$query = "SELECT * FROM tbl_student INNER JOIN tbl_testimonial ON tbl_student.stu_id = tbl_testimonial.stu_id WHERE tbl_testimonial.status = 'yes'";
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
      <td>'.$rows['mobile'].'</td>
      <td>'.$rows['class'].'</td>
      <td>'.$rows['batch'].'</td>
      <td>'.$rows['amount'].'</td>
      <td><a href="../assets/pdf/testimonial_pdf.php?stu_id='.$stu_id.'" class="btn btn-warning" target="_blank">Print PDF</a></td>      
    </tr>';
	}
}

?>
   
  </tbody>
</table>




<?php include 'admin_lib/footer.php'; ?>