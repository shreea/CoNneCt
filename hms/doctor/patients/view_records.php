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
		<title>Patient  | Dashboard</title>
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
	<style type="text/css">
	table{
		border-collapse: collapse;
		width:40%;
		font-size:15pt;
	}
	 
	table,th,td{
		border:1px solid black;
	}
	th{
		background: rgb(255,51,153);
		color:white;
		text-align:center;
	}
	tr:nth-child(odd){
		background-color:#f2f2f2;
	}
</style>

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
									<h1 class="mainTitle">Patient | Dashboard</h1>
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
						<form class="myform" action="view_records.php" method="post">
    
          <p>
             <label>select year</label><br>
             <select name= "year">
               <option value = "2017">2017</option>
               <option value = "2016">2016</option>
               <option value = "2015">2015</option>
               <option value = "2014">2014</option>
			   <option value = "2013">2013</option>
			   <option value = "2012">2012</option>
			   <option value = "2011">2011</option>
			   <option value = "2010">2010</option>
			   <option value = "2009">2009</option>
			   <option value = "2008">2008</option>
			   <option value = "2007">2007</option>
			   <option value = "2006">2006</option>
			   <option value = "2005">2005</option>
			   <option value = "2004">2004</option>
			   <option value = "2003">2003</option>
			   <option value = "2002">2002</option>
			   <option value = "2001">2001</option>
			   <option value = "2000">2000</option>
			  
             </select>
          </p>
     <p>
             <label>Select Month</label><br>
             <select name="month">
               <option value = "1">January</option>
               <option value = "2">February</option>
               <option value = "3">March</option>
               <option value = "4">April</option>
			   <option value = "5">May</option>
			   <option value = "6">June</option>
			   <option value = "7">July</option>
			   <option value = "8">August</option>
			   <option value = "9">September</option>
			   <option value = "10">October</option>
			   <option value = "11">November</option>
			   <option value = "12">December</option>
             </select>
     </p>

      
    
	<input name="submit" type="submit" id="signup_btn" value="submit"/></a>
       
    </form>
<?php
		if(isset($_POST['submit']))
		{
			$month = $_POST['month'];
			$year = $_POST['year'];
			if(!$month || !$year)
			{
				echo "<center>You need to fill in all of the required filds!</center>";
			}
			else
			{   
			
				Echo "<table>";
					Echo "<tr><th>dateofvisit</th><th>reports</th></tr>";
			
					
				 $fname=$_SESSION['login'];//only for trial else it takes session username
					
					
					$query="SELECT * FROM $fname WHERE MONTH(dateofvisit)=".$month." AND YEAR(dateofvisit)=".$year."";
					
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result))
					{
						echo"".$row["dateofvisit"]."";
						 echo" ".$row['reports']."";

					}
				
				Echo "</table>";

			}
		}
	?>
	   						