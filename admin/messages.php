<?php include 'admin_lib/header.php'; ?>

<hr style="color: black">



<h2>Messages of contacted people</h2>



</br>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sl. No</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Messages</th>     
     
      <th></th>    
    </tr>
  </thead>
  <tbody>
<?php
$query = "SELECT * FROM tbl_contact ";
$data = $db->select($query);
if($data){
	$i=0;
	while ($rows = $data->fetch_assoc()) {
   
		$i++;
		echo '<tr">
      <th scope="row">'.$i.'</th>
      <td>'.$rows['cont_name'].'</td>
      <td>'.$rows['cont_email'].'</td>
      <td>'.$rows['message'].'</td>
    
      ';


    echo '</tr>';
	}
}

?>
   
  </tbody>
</table>




<?php include 'admin_lib/footer.php'; ?>