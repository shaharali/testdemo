<?php 
include '../lib/Database.php'; 
include 'admin_lib/admin_session.php'; 
include 'admin_lib/admin_cookie.php';

AdminSession::checkLogin();
$db = new Database();

?>
<html lang="en">
<head>
  <title>Admin Login IIT, DU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/mystyle.css">
  <script src="../assets/s/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/myjs.js"></script>
  <link rel="img/logo_du.jpg" type="../image/x-icon">
	<link rel="icon" href="img/logo_du.jpg" type="../image/x-icon">

  <style type="text/css">
    body {
  background-image: url("../assets/img/iit/iit_1.jpg");
  animation: mymove 5s infinite; 
  background-repeat: no-repeat;
 
  background-size: cover;

}

@keyframes mymove {
  from {background-image: url("../assets/img/iit/iit_1.jpg");}
  to {background-image: url("../assets/img/iit/iit_2.jpg");}
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(250, 100, 150, 0.8) !important;

}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}

  </style>
</head>
<body>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    
  $email = trim($_POST['email']); 
  $password_main = $_POST['password'];
  $password = md5($_POST['password']);
  

  $query = "SELECT * FROM tbl_user WHERE email = '$email' || user_id = '$email' AND password = '$password'";
    $check = $db->select($query);
    if($check){
      while ($result = $check->fetch_assoc()) {       
       $email = $result['email'];
       $user_id = $result['user_id'];
       $name = $result['name'];
       $level = $result['level'];
       
     
       AdminSession::set("login", true);
       AdminSession::set("admin_email", $email); 
       AdminSession::set("user_id", $user_id);  
       AdminSession::set("admin_name", $name); 
       AdminSession::set("admin_level", $level); 
      }   
      
      
    if(!empty($_POST['remember']) && $_POST['remember'] == "yes"){  
       if(!isset($_COOKIE["iit_user_cookie"])|| $_COOKIE["iit_user_cookie"] !=$email)
          {
        $query = "INSERT INTO tbl_user_cookie (cook_email, cook_user_id, cook_password,cook_name, cook_level) VALUES('$email', '$user_id', '$password_main', '$name', '$level')";
        $db->insert($query);
          }
      }else{
        $query = "DELETE FROM tbl_user_cookie WHERE cook_email = '$email' ";
        $db->delete($query);
      }
      
  echo "<script>window.location = 'index.php';</script>";
}
}

if(isset($_COOKIE["iit_user_cookie"]) && $_COOKIE["iit_user_cookie"] !='') {  
        $iit_user_cookie = $_COOKIE["iit_user_cookie"]; 
        $query = "SELECT * FROM tbl_user_cookie WHERE cook_id = (SELECT max(cook_id) FROM tbl_user_cookie WHERE cook_email = '$iit_user_cookie' || cook_user_id = '$iit_user_cookie')";
        $data = $db->select($query);        
        if($data){

          while ($row = $data->fetch_assoc()) {           
            $cook_email = $row['cook_email'];
            $cook_password = $row['cook_password'];
            $cook_name = 'Log in as '.$row['cook_name'];
            $check_cook = 'checked';
          } }
        
  }else{
    $cook_email = ''; 
    $cook_password = '';
    $cook_name = '';
    $check_cook = '';
  } 


?>




<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Sign In</h3>
        <div class="d-flex justify-content-end social_icon">
          <span><i class="fab fa-facebook-square"></i></span>
          <span><i class="fab fa-google-plus-square"></i></span>
          <span><i class="fab fa-twitter-square"></i></span>
          
        </div>
      </div>
      <div class="card-body">
         <div>
            <div>
             <p> <?php echo $cook_name; ?></p>
            </div>
           
          </div>
        <form action="" method="POST">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="email" class="form-control" <?php if($cook_email !=''){ echo 'value="'.$cook_email.'"';}else{ echo 'placeholder="USER ID or E-MAIL"';} ?>>
            
          </div>
         
         
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" id="password" class="form-control" <?php if($cook_email !=''){ echo 'value="'.$cook_password.'"';}else{ echo 'placeholder="PASSWORD"';} ?>>
            </div>
          <div class="row align-items-center remember">
              <input type="checkbox" name="show" id="show" onclick="showhide('password','show');">Show Password
            <input type="checkbox" name="remember"  value="yes" <?php echo $check_cook;  ?> >Remember Me
          </div>
          <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn float-right login_btn" >
          </div>
        </form>
      </div>
      <div class="card-footer">        
        <div class="d-flex justify-content-center">
          <a class="text-info" href="forget_password.php">Forgot your password?</a>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>