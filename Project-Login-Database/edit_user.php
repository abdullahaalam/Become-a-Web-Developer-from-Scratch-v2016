
<?php

//check if user submitted form:
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//connect to database:
	include('connection.php');
	
//create variables to grab form values:
	$idnow = $_POST['userid'];
	$demail = $_POST['xemail'];
	$ffname = $_POST['firstname'];
	$llname = $_POST['lastname'];
	
//create query to update values on database:	
	$q = "UPDATE users SET first_name='$ffname', last_name='$llname', email='$demail' WHERE id='$idnow'";

	$r = mysqli_query($dbc, $q);

//check if there are any affected rows:	
	if(mysqli_affected_rows($dbc) == 1){
	
		echo "The user info has been changed succesfully!";
	
	}else{
	
		echo "Error! Something went wrong...";
	
	}
	
}

?>

<h1>Edit User</h1>
<form action="edit_user.php" method="post">
	<p><input type="hidden" name="userid" size="20" maxlength="50" value="<?php echo $_GET['user_id']; ?>" /></p>
	<p>First Name: <input type="text" name="firstname" size="20" maxlength="50" value="<?php echo $_GET['fname']; ?>" /></p>
	<p>Last Name: <input type="text" name="lastname" size="20" maxlength="50" value="<?php echo $_GET['lname']; ?>" /></p>
	<p>Email: <input type="text" name="xemail" size="20" maxlength="50" value="<?php echo $_GET['lemail']; ?>" /></p>
	<p><input type="submit" name="submit" value="Save Changes" /></p>

</form>

<a href="output.php">See Records</a>

