<?php include 'assets/header.php'; ?>
<hr style="color: black">

<div class="row">
<div class="col-md-8 contact">
<h3>Send us a message</h3>
<h6>If you have any question regarding us please feel free to send a message.</h6>

<?php
if($_SERVER['REQUEST_METHOD']==='POST' && $_POST['submit']){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$check_email = strpos($email, "@");
	$msg = '';
	$check = 0;
	if($check_email ==''){
		$msg = 'Please insert a valid E-mail!';
		$check = 1;
	}
	if($name ==''){
		$msg .= 'Name is must!';
		$check = 1;
	}
	
	if($message ==''){
		$msg .= 'Message is must!';
		$check = 1;
	}

	if($check >0){	
		echo '<span class="text text-danger"><?php  echo $msg?></span>';
	}else{
		$query = "INSERT INTO tbl_contact(cont_name, cont_email, message)VALUES('$name', '$email', '$message')";
		$insert_data = $db->insert($query);
		if($insert_data){
			echo '<span class="text text-info">Thank you for your message. We will attend it soon.</span>';
		}
	}
	


}
?>

	<form id="contact" action="contact.php" method="POST">
	  <div class="form-group">
	    <label for="name">Name *</label>
	    <input type="text" name="name" class="form-control" id="forname" placeholder="Example input">
	  </div>
	  <div class="form-group">
	    <label for="name">E-mail *</label>
	    <input type="text" name="email" class="form-control" id="foremail" >
	  </div>
	  <div class="form-group">
	    <label for="message">Message *</label>
	    <textarea type="text" name="message" class="form-control" rows="8" id="formessage" ></textarea>
	  </div>
	  <div class="form-group">
	    <label for="submit"></label>
	    <input type="submit" name="submit" class="form-control btn btn-info" id="forsubmit" value="Submit" onmouseover="forcontact()">
	  </div>
</form>
</div>


<div class="col-md-4 contact-address">
	<h4>Contact Information</h4>
	<h6>Address: IIT,University of Dhaka</h6>
	<h6>E-mail: iit@du.ac.bd</h6>
	<h6>Mobile: 8801779482994</h6>
	<h6><a href="index.php">http://www.iit.du.ac.bd</a></h6>
		</br></br>
	<h3>Contact Hours</h3>
	<h6>Sunday-Thursday: 9am to 5pm</h6>
	<h6>Friday-Saturday: Closed</h6>
</div>	
</div>



<!-- The Modal -->
  <div class="modal fade" id="concat_modal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-info">Contact Error</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h5 class="text-danger" id="cortact-error"></h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
        </div>
        
      </div>
    </div>
  </div>













<?php include 'assets/footer.php'; ?>