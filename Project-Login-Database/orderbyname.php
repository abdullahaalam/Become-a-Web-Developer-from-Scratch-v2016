
<?php

//include connection script to database:
	include("connection.php");

	//make a query to select lastname field by ascendent order:
	$r = mysqli_query($dbc, "SELECT * FROM users ORDER BY last_name ASC");
	
	//create order by id link:
	echo "<p><a href='output.php'><b>Order by id</b></a></p>";
	
	//create table:
	echo "<table align='center' border='1' cellspacing='3' cellpadding='3' width='75%'>
	<tr>
		<td align='left'><b>Name</b></td><td align='left'><b>Email</b></td>
	</tr>";
	
	//use while loop to create an associative array with values lastname, firstname and email:
	while($row = mysqli_fetch_array($r)){
	//output values from associative array:
		echo "<tr><td align='left'>".$row['last_name'].", ".$row['first_name']."</td><td align='left'>".$row['email']."</td></tr>";
			
	}
	
//close mysql connection:
mysqli_close($dbc);


?>