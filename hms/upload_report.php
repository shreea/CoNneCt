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
		


	</head>
	<body>
		<div id="app">		

		
						
				
						
									
											<form method= "POST" enctype="multipart/form-data">
											<div class="form-group">
										    <input name="userfile[]" class="form-control" type="file"  multiple="multiple"> 
										    
		                        
                                            <input name="upload" type="submit" class="box" id="upload" value=" Upload ">
                                           
						        	
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
$fname=$_SESSION['login'];
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
								