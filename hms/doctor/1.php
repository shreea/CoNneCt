<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');

?>
<?php
$_SESSION['username']="samisha";
						 $query=mysql_query("SELECT doctorName from doctors where doctorName='".$_SESSION['username']."'");
while($row=mysql_fetch_array($query))
{   
	echo $row['doctorName'];
}?>