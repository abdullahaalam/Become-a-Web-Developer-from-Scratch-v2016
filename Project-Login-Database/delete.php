

<?php

//avoid error notices, display only warnings:
error_reporting(0);

//check if user submitted form:
if($_SERVER['REQUEST_METHOD']=='POST'){

//connect to database:
		include('connection.php');
		
//get user_id value from form:
		$id_user = mysqli_real_escape_string($dbc, trim($_POST['user_id']));

//delete user where id = $id_user: 
		mysqli_query($dbc, "DELETE FROM users WHERE id='$id_user'");
		
		echo "The user has been sucessfully deleted!";


}


?>


<h3>Are you sure you want to delete this user?</h3>

<form method="post" action="delete.php">
	<p>User ID:<input type='text' name='user_id' value="<?php echo $_GET['user_id']; ?>" /></p>
	<p>First Name:<input type='text' name='first_name' value="<?php echo $_GET['fname']; ?>" /></p>
	<p>Last Name:<input type='text' name='last_name' value="<?php echo $_GET['lname']; ?>" /></p>
	<p><input type='submit' name='submit' value='Yes, Delete User Now!' /></p>
	<p><a href="output.php">Don't Delete User, Go Back</a></p> 
</form>