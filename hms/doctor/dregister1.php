<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['doctorName'];
$address=$_POST['address'];
$docFee=$_POST['docFee'];
$contactno=$_POST['contactno'];
$email=$_POST['docEmail'];
$password=md5($_POST['password']);
$specialization=$_POST['specialization'];
$query=mysql_query("insert into doctors(doctorName,address,docFee,contactno,docEmail,password,specialization) values('$fname','$address','$docFee','$contactno' , '$email','$password','$specialization')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";

                             {    $images = array();
                                  $directory = 'uploads';
                                  if ($handle = opendir($directory)) 
                                  {
                                    while (false !== ($file = readdir($handle))) 
                                  {
                                  if (preg_match("/\.png$/", $file)) $images[] = $file;
                                  elseif (preg_match("/\.jpg$/", $file)) $images[] = $file;
                                  elseif (preg_match("/\.jpeg$/", $file)) $images[] = $file;
                                  elseif (preg_match("/\.gif$/", $file)) $images[] = $file;
                                  }
                                     shuffle($images);
                                      closedir($handle);
                                      mkdir("./uploads/profile_images/". $fname ."", 0777, true);
                                       $upload_path = "./uploads/profile_images/". $fname ."";


                                       {

                                           for($a=0; $a < count($_FILES['multiImgs']['name']); $a++)
                                           {
                                               move_uploaded_file($_FILES['multiImgs']['tmp_name'][$a],"uploads/profile_images/" .$fname. "/ ".$_FILES['multiImgs']['name'][$a]);

                                           }
                                       }
}
}	//header('location:user-login.php');
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Doctor Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
		
		

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<h2>Doctor Registration</h2>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="doctorName" placeholder="Full Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" required>
							</div>
							
							<div class="form-group">
								<input type="text" class="form-control" name="specialization" placeholder="specialization" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="docFee" placeholder="visiting fees" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="contactno" placeholder="contact number" required>
							</div>
							
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="docEmail" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
								
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="password_again" placeholder="Password Again" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
							
							Upload Image to set your profile picture
                          <input type="file" name="multiImgs[]" multiple/><br>
                          <i class="fa fa-lock"></i>

							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span> CoNNeCt. <span>All rights reserved</span>
					</div>

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
	</body>
</html>