<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient | Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Patient| Dashboard</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient</span>
									</li>
									<li class="active">
										<span>Dashboard</span>
									</li>
								</ol>
							</div>
						</section>
						<form method= "POST" enctype="multipart/form-data">
											
										    <input name="userfile[]" class="form-control" type="file"  multiple="multiple"> 
										    <input name="dateofvisit" type="date">
										     <input name="upload" type="submit" class="box" id="upload" value=" Upload ">
                                            </form>
                                            <?php
				for ($i=0; $i < count($_FILES['userfile']['name']); $i++) 
{ 
					
				
if(isset($_POST['upload']) && $_FILES['userfile']['size'] [$i]> 0)
{
$fileName = $_FILES['userfile
']['name'][$i];
$tmpName  = $_FILES['userfile']['tmp_name'][$i];
$fileSize = $_FILES['userfile']['size'][$i];
$fileType = $_FILES['userfile']['type'][$i];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));

fclose($fp);
$fname="testsam";
$dateofvisit=$_POST['dateofvisit'];

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
$connect = mysqli_connect('localhost', 'root', '','visitspatient');
$query="INSERT INTO $fname (dateofvisit,reports) VALUES('$dateofvisit','$content')";
				$query_run=mysqli_query($con,$query);

//$query = "INSERT INTO $fname (dateofvisit,reports ) ".
//"VALUES ( '$dateofvisit',$content')";

mysqli_query($connect,"$query") or die('Error, query failed'); 

//echo "<br>File $fileName uploaded<br>";
} echo "<script>alert('Reports uploaded successfully ');</script>";
} 
?>
</body>
</html>					
								