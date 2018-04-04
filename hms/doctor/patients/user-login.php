<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{  if(!$_POST['username'] || !$_POST['password'])
	{
     echo "<center>You need to fill in a <b>Username</b> and a <b>Password</b>!</center>";
    }
    else
   {
   $ret=mysql_query("SELECT * FROM users WHERE fullname='".$_POST['username']."'");
   $num=mysql_fetch_array($ret);
   if($num == 0)
        {
            echo "<center>The <b>Username</b> you supplied does not exist!</center>";
        }
    else
       {
          $ret=mysql_query("SELECT * FROM users WHERE fullname='".$_POST['username']."' and password='".md5($_POST['password'])."'");
           $num=mysql_fetch_array($ret);

           if($num == 0)
           {
              echo "<center>The <b>Password</b> you supplied does not match the one for that username!</center>";
           }
           else
           { $extra="dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
            }
     } 
}
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient-Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/styles1.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		
		
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<h2> CoNNeCt | Patient Login</h2>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your name and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Username">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password">
									<i class="fa fa-lock"></i>
									 </span>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Don't have an account yet?
								<a href="registration.php">
									Create an account
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span> CoNNeCt. <span>All rights reserved</span>
					</div>
			
				</div>

			</div>
		</div>
		
	
	</body>
</html>