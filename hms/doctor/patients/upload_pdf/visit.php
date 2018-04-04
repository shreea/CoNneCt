<?php
$con=new PDO('mysql:host=localhost; dbname=hms', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
	$year=$_POST['year'];
	$month=$_POST['month'];
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <h1>Visits History</h1>
    <form class="myform" action="visit.php" method="post">

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
<input name="submit" type="submit" id="signup_btn" value="GO"/></a>
</form>
</br>
</br>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
	<?php
			//$month = $_POST['month'];
			//$year = $_POST['year'];
			$query="SELECT * FROM upload WHERE MONTH(date)=".$month." AND YEAR(date)=".$year."";
			$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result))
			//$query=$conn->query("select * from upload order by id desc");
			{
				$date=$row['date'];
				$name=$row['name'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ; echo $date; ?>
				</td>
				<td>
					<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		
			
		
	?>
	   
 </body>
    </html>